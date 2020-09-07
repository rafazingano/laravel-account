<div class="form-group">
    <label class="control-label">Titulo do plano<span class="required"> * </span></label>
    {!! Form::text('title', isset($plan) ? $plan->title : null, ['class' => 'form-control', 'placeholder' => 'Digite o titulo do plano', 'required']) !!}
</div>
<div class="form-group">
    <label class="control-label">Descrição <span class=""> </span></label>
    {!! Form::textarea('description', isset($plan) ? $plan->description : null, ['class' => 'form-control', 'placeholder' => 'Digite a descrição do plano', 'required']) !!}
</div>
