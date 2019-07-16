( function( blocks, editor, element, components, safervpn ) {
  var el = element.createElement;

  var BLOCK_NAME = 'safervpn/iblock-best-vpn';
  var fields = {
    title: {
      label: "Input title",
      type: "string",
      widget: "input",
      default: "Lightning speed & multiple protocols"
    },
    text: {
      label: "Input text",
      type: "string",
      widget: "input",
      default: "With custom-coded servers and multiple protocols, you’ll get the highest speeds possible from any location you choose. Our VPN Software runs so fast, you won't even notice it's there."
    },
    imageSideSelector: {
      label: "Select Image Side",
      type: "string",
      options: [
        {label: 'Right', value: 'right'},
        {label: 'Left', value: 'left'},
      ],
      widget: "select",
      default: "opt-one"
    },
    picture: {
      label: "Image",
      type: "string",
      widget: "image",
      default: ""
    },
    picture2x: {
      label: "Image 2x",
      type: "string",
      widget: "image",
      default: ""
    },
    picture3x: {
      label: "Image 3x",
      type: "string",
      widget: "image",
      default: ""
    },
  };

  blocks.registerBlockType(BLOCK_NAME, {
    title: 'IBlock Best VPN',
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


