( function( editor, element, components, media, safervpn ) {
  var el = element.createElement;

  var createLabel = function(label) {
    return el('label', {className: 'components-base-control__label'}, label);
  };

  /**
   * Creates Input/text box
   *
   * @see https://wordpress.org/gutenberg/handbook/designers-developers/developers/components/text-control/
   * @param {String} value
   * @param {Function} onChange
   * @returns {Element}
   */
  var createInputField = function(value, onChange) {
    return el(components.TextControl, {
      value: value,
      onChange: onChange
    });
  };

  /**
   * Creates Textarea control
   *
   * @see https://wordpress.org/gutenberg/handbook/designers-developers/developers/components/textarea-control/
   * @param {String} value
   * @param {Function} onChange
   * @returns {Element}
   */
  var createTextareaField = function(value, onChange) {
    return el(components.TextareaControl, {
      value: value,
      onChange: onChange
    })
  };

  /**
   * Creates Color picker control
   *
   * @see https://wordpress.org/gutenberg/handbook/designers-developers/developers/components/color-picker/
   * @param {String} value
   * @param {Function} onChange
   * @returns {Element}
   */
  var createColorField = function(value, onChange) {
    return el('p', {style: {width: '250px'}},
      el(components.ColorPicker, {style: {float: 'left'}, color: value, onChangeComplete: function(newValue) { onChange(newValue.hex) }})
    )
  };

  /**
   * Creates Selectbox/Dropdown control
   *
   * @see https://wordpress.org/gutenberg/handbook/designers-developers/developers/components/select-control/
   * @param {String} value
   * @param {Array<Object>} options
   * @param {Function} onChange
   * @returns {Element}
   */
  var createSelectField = function(value, options, onChange) {
    return el(components.SelectControl, {
      value: value,
      options: options,
      onChange: onChange
    });
  };

  /**
   * Creates Image uploader control
   *
   * @see https://wordpress.org/gutenberg/handbook/designers-developers/developers/components/button/
   * @param {String} value
   * @param {Function} onChange
   * @returns {Element}
   */
  var createImageField = function(value, onChange) {
    var onChooseImage = function(onChange){ return function() {
      var image = wp.media({
        title: 'Upload Image',
        multiple: false // only one image to upload
      }).open()
        .on('select', function(e){
          var uploaded_image = image.state().get('selection').first();
          onChange(uploaded_image.attributes.url);
          image.close();
        });
    }}(onChange);
    return el(components.Button, {onClick: onChooseImage}, 'Change image');
  };

  /**
   * Creates list of items control
   *
   * @param {String} fieldName
   * @param {Object} field
   * @param {Object} attrs
   * @param {Function} setAttributes
   * @returns {Element}
   */
  var createArrayField = function(fieldName, field, attrs, setAttributes) {
    // Prepare list of items in to render in edit view
    var fields = [];
    for (var i in attrs[fieldName].values) {
      var onEdit = (function(index) {return function() {
        var data = {};
        data[fieldName] = Object.assign({}, attrs[fieldName]);
        data[fieldName].editingIndex = index;
        setAttributes(data);
      }})(i);
      var onDelete = (function(index) {return function() {
        var data = {};
        data[fieldName] = Object.assign({}, attrs[fieldName]);
        data[fieldName].values.splice(index , 1);
        setAttributes(data);
      }})(i);
      fields.push(el(
        'li',
        null,
        attrs[fieldName].values[i][field.titleField],
        el(components.Button, {onClick: onEdit}, 'Edit'),
        el(components.Button, {onClick: onDelete}, 'Delete')
      ));
    }

    // Create modal window if need
    var editModal = null;
    if (attrs[fieldName].editingIndex !== undefined) {
      var editingIndex = attrs[fieldName].editingIndex;
      var subfields = [];
      var values = attrs[fieldName].values[editingIndex];
      for (var subfieldName in field.subfields) {
        var subfield = field.subfields[subfieldName];

        var onChange = function(subfieldName, setAttributes) {return function(newValue){
          var data = {};
          data[fieldName] = Object.assign({}, attrs[fieldName]);
          data[fieldName].values[editingIndex][subfieldName] = newValue;
          setAttributes(data);
        }}(subfieldName, setAttributes);

        subfields.push(createLabel(subfield.label));
        switch (subfield.widget) {
          case 'input': subfields.push(createInputField(values[subfieldName], onChange)); break;
          case 'textarea': subfields.push(createTextareaField(values[subfieldName], onChange)); break;
          case 'color': subfields.push(createColorField(values[subfieldName], onChange)); break;
          case 'select': subfields.push(createSelectField(values[subfieldName], subfield.options, onChange)); break;
          case 'image': subfields.push(createImageField(values[subfieldName], onChange)); break;
        }
      }
      var closeModal = function() {
        var data = {};
        data[fieldName] = Object.assign({}, attrs[fieldName]);
        data[fieldName].editingIndex = undefined;
        setAttributes(data);
      };
      editModal = el(
        components.Modal,
        {title: 'Edit Item', display: false, onRequestClose: closeModal},
        [
          subfields,
          el('div', null,
            el(components.Button, {isPrimary: true, onClick: closeModal}, 'Close')
          )
        ]
      );
    }

    // hander to add new item to attributes
    var onAddItem = function() {
      var newItem = {};
      for (var subfieldName in field.subfields) {
        newItem[subfieldName] = '';
      }
      var data = {};
      data[fieldName] = Object.assign({}, attrs[fieldName]);
      data[fieldName].values.push(newItem);
      setAttributes(data);
    };

    // render modal(?), list of items, button to add item
    return el('div', null,
      editModal,
      el('ul', null, fields),
      el(components.Button, {onClick: onAddItem}, 'Add Item')
    );
  };

  safervpn.getEditor = function(fields, attrs, setAttributes) {
    var result = [];

    for (var fieldName in fields) {
      var field = fields[fieldName];

      var onChange = function(fieldName, setAttributes) {return function(newValue){
        var newAttrs = {};
        newAttrs[fieldName] = newValue;
        setAttributes(newAttrs)
      }}(fieldName, setAttributes);

      result.push(createLabel(field.label));
      switch (field.widget) {
        case 'input': result.push(createInputField(attrs[fieldName], onChange)); break;
        case 'textarea': result.push(createTextareaField(attrs[fieldName], onChange)); break;
        case 'color': result.push(createColorField(attrs[fieldName], onChange)); break;
        case 'select': result.push(createSelectField(attrs[fieldName], field.options, onChange)); break;
        case 'image': result.push(createImageField(attrs[fieldName], onChange)); break;
        case 'array': result.push(createArrayField(fieldName, field, attrs, setAttributes)); break;
      }
    }

    return result;
  }

}(
  window.wp.editor,
  window.wp.element,
  window.wp.components,
  window.wp.media,
  window.safervpn = window.safervpn || {}
) );