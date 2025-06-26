const d = document;
const c = console.log;

// función para formatear número a moneda, porcentaje o decimal
function formatearNum(numero, tipo) {

	switch (tipo) {
		case "$":
			return new Intl.NumberFormat(['es-CO'], {style: 'currency', currency: 'COP'}).format(numero);
			break;
		case "%":
			return new Intl.NumberFormat(['es-CO'], {style: 'percent', minimumSignificantDigits: 3, maximumSignificantDigits: 3}).format(numero);
			break;
		case ",":
			return new Intl.NumberFormat(['es-CO'], {style: 'decimal', minimumFractionDigits: 2, maximumFractionDigits: 2}).format(numero);
			break;
		case "$0":
			return new Intl.NumberFormat(['es-CO'], {style: 'currency', currency: 'COP', minimumFractionDigits: 0, maximumFractionDigits: 0}).format(numero);
			break;
		default:
			break;
			
	}

}
