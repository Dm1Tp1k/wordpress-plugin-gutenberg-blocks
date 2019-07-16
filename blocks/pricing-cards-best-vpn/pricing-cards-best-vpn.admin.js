( function( blocks, editor, element, components, safervpn ) {
  var el = element.createElement;

  var BLOCK_NAME = 'safervpn/pricing-cards-best-vpn';
  var fields = {
    icon1: {label: "Icon 1", type: "string", widget: "image", default: ""},
    years1: {label: "Years 1", type: "string", widget: "input", default: "3 Years"},
    price1: {label: "Price 1", type: "string", widget: "input", default: "2.50"},

    icon2: {label: "Icon 2", type: "string", widget: "image", default: ""},
    years2: {label: "Years 2 ", type: "string", widget: "input", default: "2 Years"},
    price2: {label: "Price 2", type: "string", widget: "input", default: "3.29"},

    icon3: {label: "Icon 3", type: "string", widget: "image", default: ""},
    years3: {label: "Years 3", type: "string", widget: "input", default: "1 Year"},
    price3: {label: "Price 3", type: "string", widget: "input", default: "5.49"},
  };

  blocks.registerBlockType(BLOCK_NAME, {
    title: 'Pricing Cards Best VPN',
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


