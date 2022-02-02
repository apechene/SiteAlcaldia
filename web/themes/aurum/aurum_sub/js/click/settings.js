c2c.from = '1000';
	c2c.text = 'Llámanos ahora! <span class="pi-bullet-icon"><i class="pi-row-block-icon icon-phone pi--base"></i></span>';
	c2c.cls = 'call-button btn btn-large pi-btn-green pi-btn-bigger';
	c2c.config = {
    		http_service_url: null,
    		websocket_proxy_url: 'wss://vbarrera.tk:8089/ws',
    		sip_outbound_proxy_url: 'udp://vbarrera.tk:5060'
	};
	c2c.init();