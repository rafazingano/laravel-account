<div class="row">
    <div class="col-9">
        <div class="form-group">
            <label class="control-label">Nome <span class="required"> * </span></label>
            {!! Form::text('name', isset($account) ? $account->name : null, ['class' => 'form-control', 'placeholder' => 'Digite o nome', 'required']) !!}
        </div>
        <div class="form-group">
            <label class="control-label">E-mail <span class="required"> * </span></label>
            {!! Form::text('email', isset($account) ? $account->email : null, ['class' => 'form-control', 'placeholder' => 'Digite o e-mail', 'required']) !!}
        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            <label class="control-label">Plano <span class="required"> * </span></label>
            {!! Form::select('plan_id', $plans, isset($account) ? $account->plans->pluck('id') : null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            <label class="control-label">Status <span class="required"> * </span></label>
            {!! Form::select('status', [1 => 'Ativado', 0 => 'Desativado'], isset($account) ? $account->status : null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>