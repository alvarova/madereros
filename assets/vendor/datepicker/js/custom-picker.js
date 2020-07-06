$('.datepicker').pickadate()

$('.datepicker-custom-labels').pickadate({
  weekdaysShort: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
	showMonthsShort: true
})

$('.datepicker-custom-buttons').pickadate({
	today: 'Hoy',
	clear: 'Borrar',
	close: 'Cancelar'
})

$('.datepicker-date-format').pickadate({
	// Escape any “rule” characters with an exclamation mark (!).
	format: 'Seleccione: dddd, dd mmm, yyyy',
	formatSubmit: 'yyyy/mm/dd',
	hiddenPrefix: 'prefix__',
	hiddenSuffix: '__suffix'
})

$('.datepicker-date-format2').pickadate({
	// Escape any “rule” characters with an exclamation mark (!).
	formatSubmit: 'yyyy/mm/dd',
	hiddenName: true
})

$('.datepicker-date-limit').pickadate({
	min: new Date(2019,3,20),
	max: new Date(2019,10,15)
})

$('.datepicker-min-max').pickadate({
	// An integer (positive/negative) sets it relative to today.
	min: -15,
	// `true` sets it to today. `false` removes any limits.
	max: true
})

$('.datepicker-disable-weeks').pickadate({
	disable: [
	  1, 4, 7
	]
})

$('.datepicker-container').pickadate({
	container: '#root-picker-outlet'
})

$('.datepicker-dropdowns').pickadate({
	selectYears: true,
	selectMonths: true,
	weekdaysShort: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
	showMonthsShort: true,
	today: 'Hoy',
	clear: 'Borrar',
	close: 'Cancelar'
})


$('.datepicker-set-years').pickadate({
	// `true` defaults to 10.
	selectYears: 4
})