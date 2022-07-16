<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group"> 
            {{ Form::label('user_id') }}
            <div class="mb-3">
                <select class="form-control" name="user_id" required>
                  <option value="{{ $employee->user_id }}" selected>{{ $employee->user->name }}</option>
                  @foreach ($users as $value => $key )
                  <option value="{{ $key }}">{{ $value }}</option>
                  @endforeach
                </select>
              </div>
        </div>
        <div class="form-group">
            {{ Form::label('nip') }}
            {{ Form::text('nip', $employee->nip, ['class' => 'form-control' . ($errors->has('nip') ? ' is-invalid' : ''), 'placeholder' => 'Nip']) }}
            {!! $errors->first('nip', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('department') }}
            {{ Form::text('department', $employee->department, ['class' => 'form-control' . ($errors->has('department') ? ' is-invalid' : ''), 'placeholder' => 'Department']) }}
            {!! $errors->first('department', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('position') }}
            {{ Form::text('position', $employee->position, ['class' => 'form-control' . ($errors->has('position') ? ' is-invalid' : ''), 'placeholder' => 'Position']) }}
            {!! $errors->first('position', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>