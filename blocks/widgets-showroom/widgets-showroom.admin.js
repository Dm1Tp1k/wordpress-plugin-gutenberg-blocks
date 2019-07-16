( function( blocks, editor, element, components, safervpn ) {
  var el = element.createElement;

  var BLOCK_NAME = 'safervpn/widgets-showroom';
  var fields = {
    widgetInputAttr: {
      label: "Input field example",
      type: "string",
      widget: "input",
      default: "Header text"
    },
    widgetTextareaAttr: {
      label: "Text area field example",
      type: "string",
      widget: "textarea",
      default: "Subheader text"
    },
    widgetSelectAttr: {
      label: "Select (dropdown) field example",
      type: "string",
      options: [
        {label: 'One', value: 'opt-one'},
        {label: 'Two', value: 'opt-two'},
        {label: 'Three', value: 'opt-three'},
      ],
      widget: "select",
      default: "opt-one"
    },
    widgetImageAttr: {
      label: "Image field example",
      type: "string",
      widget: "image",
      default: ""
    },
    widgetColorAttr: {
      label: "Color picker example",
      type: "string",
      widget: "color",
      default: "#F00"
    },
    widgetItemsAttr: {
      label: 'Items',
      type: 'array',
      widget: 'array',
      titleField: 'title',
      subfields: {
        title: {label: "Title", type: "string", widget: "input", default: "Title"},
      },
      default: {values: [
        {title: 'Absolute Anonymity'},
        {title: 'Automatic Security'},
        {title: 'Advanced Encryption'},
      ]}
    }
  };

  blocks.registerBlockType(BLOCK_NAME, {
    title: 'Widgets Showroom',
    icon: 'universal-access-alt',
    category: 'widgets',
    attributes: Object.assign({}, fields),
    edit: function( props ) {
      if (props.isSelected) {
        return el('p', null, safervpn.getEditor(fields, props.attributes, props.setAttributes));
      } else {
        var data = {
          block: BLOCK_NAME,
          attributes: props.attributes
        };
        return (
          el(components.ServerSideRender, data)
        );
      }
    },
    save: function() { return null; }
  });
}(
  window.wp.blocks,
  window.wp.editor,
  window.wp.element,
  window.wp.components,
  window.safervpn = window.safervpn || {}
) );


