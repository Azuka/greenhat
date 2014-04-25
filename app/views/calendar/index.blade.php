@section('page_title')
{{ Lang::get('app.calendar.title') }}
@stop

@section('content')

<div id="calendar"></div>

@stop

@section('footer')
<script>
	var calendar = $("#calendar").calendar(
	{
		tmpl_path: "/assets/tmpls/",
		events_source: function () { return []; },
		language: '{{ Session::get('lang', 'en') }}',
		views: {
			year:  {
				slide_events: 0,
				enable:       0
			},
			month: {
				slide_events: 1,
				enable:       1
			},
			week:  {
				enable: 0
			},
			day:   {
				enable: 0
			}
		}
	});
</script>

@stop