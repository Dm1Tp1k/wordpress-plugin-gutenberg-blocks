( function( blocks, editor, element, components, safervpn ) {
  var el = element.createElement;

  var BLOCK_NAME = 'safervpn/cards-6-best-vpn';
  var fields = {
    cards: {label: 'Items', type: 'array', widget: 'array',
      titleField: 'title',
      subfields: {
        title: {label: "Title", type: "string", widget: "input", default: "Title"},
        text: {label: "Text", type: "string", widget: "input", default: "Text"},
        icon: {label: "Icon", type: "string", widget: "image", default: ""},
      },
      default: {values: [
        {title: 'Absolute Anonymity', text: 'Choose from over 36 locations to enjoy private browsing from anywhere.', icon: ''},
        {title: 'Automatic Security', text: 'Protect your online activity and personal data from anyone who wants it.', icon: ''},
        {title: 'Advanced Encryption', text: 'Ensure your privacy on the web by using military-grade VPN encryption.', icon: ''},
        {title: 'Ultimate Freedom', text: 'Bypass regional restrictions and online censorship at the click of a button.', icon: ''},
        {title: 'Unrestricted Streaming', text: 'Enjoy popular streaming services without blackouts, throttling or disruptions.', icon: ''},
        {title: 'Unlimited Bandwidth', text: 'Download and stream as much content as you want with no bandwidth caps.', icon: ''},
      ]}
    },
  };

  blocks.registerBlockType(BLOCK_NAME, {
    title: '6 Carts Best VPN',
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


