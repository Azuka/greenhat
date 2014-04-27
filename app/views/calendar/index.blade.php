@section('page_title')
{{ Lang::get('app.calendar.title') }}
@stop

@section('content')

<div id="calendar"></div>

<div id="modal-dialog-calendar" class="modal">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header">

            <a href="#" data-dismiss="modal" aria-hidden="true" class="close">×</a>
             <h3>{{ Lang::get('app.calendar.modal.title') }}</h3>
        </div>

       {{ Form::open(array('route' =>array('calendar.create'), 'method' => 'post', 'role' => 'form', 'class' => 'form-horizontal' )) }}

        <div class="modal-body">
            <fieldset>				
					<div class="form-group">
                        <label class="control-label col-sm-4" for="eventTitle">{{ Lang::get('app.calendar.modal.eventTitle') }}</label>
                        <div class="col-sm-6">{{Form::text('eventTitle', '', array('class' => 'form-control', 'id'=> 'eventTitle', 'maxlength' => 255));}}</div>
                     </div>
				
                     <div class="form-group">
                        <label class="control-label col-sm-4" for="startTime">{{ Lang::get('app.calendar.modal.startTime') }}</label>
                        <div class="col-sm-6"><div class="input-group date" data-date-format="{{ Lang::get('app.format.dateJs') }}">{{Form::text('startTime', '', array('class' => 'form-control', 'id'=> 'startTime'));}}<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span></div></div>
                     </div>
				
                     <div class="form-group">
                        <label class="control-label col-sm-4" for="endTime">{{ Lang::get('app.calendar.modal.endTime') }}</label>
                        <div class="col-sm-6"><div class="input-group date" data-date-format="{{ Lang::get('app.format.dateJs') }}">{{Form::text('endTime', '', array('class' => 'form-control', 'id'=> 'endTime'));}}<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span></div></div>
                     </div>
					 
					<div class="form-group">
						<label class="control-label col-sm-4" for="description">{{ Lang::get('app.calendar.modal.description') }}</label>
						<div class="col-sm-8">{{ Form::textarea('description', '', array('class' => 'form-control', 'rows' => 2, 'id'=> 'description','maxlength' => 255)) }}</div>
					</div>
					 
           </fieldset> 
        </div>

        <div class="modal-footer">

              <div class='col-sm-offset-2 col-sm-10'> 
                <input type="submit" value="{{ Lang::get('app.calendar.modal.save') }}" class="btn btn-primary">
                <a href="#" data-dismiss="modal" aria-hidden="true" class="btn btn-danger">{{ Lang::get('app.calendar.modal.cancel') }}</a>
              </div>
        </div>
        {{ Form::token() }}
        {{ Form::close() }}

      </div>
    </div>
</div>

@stop

@section('footer')
<script>
	var calendar = $("#calendar").calendar(
	{
		tmpl_path: "/assets/tmpls/",
		events_source: '{{ route('calendar.get') }}',
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
	
	$('#modal-dialog-calendar').on('shown.bs.modal', function(){
		$('#eventTitle').focus();
	});
	
	$('.cal-month-day').on('dblclick', function(){
		$('#modal-dialog-calendar').modal('show');
	});
	
	$('.input-group').datetimepicker();
	
	
    $('.modal form').each(function(i,e) {
		var g = e;
		$(e).ajaxForm({
			dataType: 'json',
			success: function (d, x, s, f) {
				$.rails.enableFormElements($($.rails.formSubmitSelector));
				var a = $('<div class="alert" />');
				$('.alert', f).remove();
				if (d.error)
				{
					a.addClass('alert-danger').html('<strong>There were some errors:</strong> '+d.msg);
				}
				else
				{
					a.addClass('alert-success').html(d.msg);
					f[0].reset();
					$('modal').modal('hide');
				}

				a.prependTo(f);
			},
			error: function (x, s) {
				$.rails.enableFormElements($($.rails.formSubmitSelector));
				var a = $('<div class="alert" />');
				$('.alert', g).remove();
				a.addClass('alert-danger').text(s).prependTo(g);
			}
		});
	});
    $('.modal').bind('hidden.bs.modal', function() {
        $('.alert', this).remove();  
    });
</script>

@stop