{{ $slot }}

<form action="{{ route('site.contato') }}" method="POST">
    @csrf
    <input name="nome" type="text" placeholder="Nome" class="{{$class}}" value="{{ old('nome') }}">
    @if($errors->has('nome'))
        <div style="color: red">
            {{ $errors->first('nome') }}
        </div>
    @endif
    <br>
    <input name="telefone" type="tel" placeholder="Telefone" class="{{$class}}" value="{{ old('telefone') }}">
    @if($errors->has('telefone'))
        <div style="color: red">
            {{ $errors->first('telefone') }}
        </div>
    @endif
    <br>
    <input name="email" type="email" placeholder="E-mail" class="{{$class}}" value="{{ old('email') }}">
    @if($errors->has('email'))
        <div style="color: red">
            {{ $errors->first('email') }}
        </div>
    @endif
    <br>
    <select name="motivo_contatos_id" class="{{$class}}">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($motivo_contatos as $key => $motivo_contato)
            <option value="{{ $motivo_contato->id }}" {{ old('motivo_contatos_id') == $motivo_contato->id ? 'selected' : '' }}>{{ $motivo_contato->motivo_contato }}</option>
        @endforeach
    </select>
    @if($errors->has('motivo_contatos_id'))
        <div style="color: red">
            {{ $errors->first('motivo_contatos_id') }}
        </div>
    @endif
    <br>
    <textarea name="mensagem" class="{{$class}}" placeholder="Preencha aqui a sua mensagem...">{{ @old('mensagem') }}</textarea>
    @if($errors->has('mensagem'))
        <div style="color: red">
            {{ $errors->first('mensagem') }}
        </div>
    @endif
    <br>
    <button type="submit" class="{{$class}}">ENVIAR</button>
</form>

