( function( blocks, editor, element, components, safervpn ) {
  var el = element.createElement;

  var BLOCK_NAME = 'safervpn/riskfree-best-vpn';
  var fields = { 
    header: {label: "Header", type: "string", widget: "image", default: "100% Risk Free Money-Back Guarantee"},
    subheader: {label: "Subheader", type: "string", widget: "input", default: "If you're not 100% satisfied with SaferVPN, we'll refund your payment. No hassle, no risk."},
  };

  blocks.registerBlockType(BLOCK_NAME, {
    title: 'RiskFree Best VPN',
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
