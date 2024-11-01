jQuery(document).ready(function( $ ) {
	if ($("#tjs-gulden-address").length > 0){
		var nlgaddress = $( "#tjs-gulden-address" ).val();
		var options = {
			render: 'image',
			minVersion: 1,
			maxVersion: 40,
			ecLevel: 'H',
			fill: '#000',
			// background: null,
			background: '#fff',
			text: nlgaddress,
			radius: 0,
			quiet: 0,
			mode: 0,
			mSize: 0.1,
			mPosX: 0.5,
			mPosY: 0.5,
			label: 'no label',
			fontname: 'sans',
			fontcolor: '#000',
			image: null
		}
		$( "#tjs-gulden-qr-code" ).qrcode(options);
	}

	if ($("#tjs-bitcoin-address").length > 0){
		var btcaddress = $( "#tjs-bitcoin-address" ).val();
		var options = {
			render: 'image',
			minVersion: 1,
			maxVersion: 40,
			ecLevel: 'H',
			fill: '#000',
			// background: null,
			background: '#fff',
			text: btcaddress,
			radius: 0,
			quiet: 0,
			mode: 0,
			mSize: 0.1,
			mPosX: 0.5,
			mPosY: 0.5,
			label: 'no label',
			fontname: 'sans',
			fontcolor: '#000',
			image: null
		}
		$( "#tjs-bitcoin-qr-code" ).qrcode(options);
	}
});