( function( blocks, editor, element, components, safervpn ) {
  var el = element.createElement;

  var BLOCK_NAME = 'safervpn/header-subheader';
  var fields = {
    header: {
      label: "Input header",
      type: "string",
      widget: "input",
      default: ""
    },
    subheader: {
      label: "Input subheader",
      type: "string",
      widget: "input",
      default: ""
    },
  };

  blocks.registerBlockType(BLOCK_NAME, {
    title: 'Header Subheader',
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


