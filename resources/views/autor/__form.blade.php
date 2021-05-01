@include('layouts.validacao')
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="nome" class="control-label">Nome:</label> 
            <input type="text" 
                   name="nome" 
                   id="nome"
                   value="{{ isset( $registro->nome) ? $registro->nome : ''  }}" 
                   class="form-control @error('nome') is-invalid @enderror" />
                   @error('nome')
                        <div class="invalid-feedback">
                            <span><strong>{{ $message }}</strong></div>
                        </div>
                   @enderror
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="pseudonimo" class="control-label">Pseudônimo:</label> 
            <input type="text" 
                   name="pseudonimo" 
                   id="pseudonimo"
                   value="{{ isset( $registro->pseudonimo ) ? $registro->pseudonimo : ''  }}"
                   class="form-control @error('pseudonimo') is-invalid @enderror" />
                   @error('pseudonimophp ')
                        <div class="invalid-feedback">
                            <span><strong>{{ $message }}</strong></div>
                        </div>
                   @enderror

        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-3 col-md-3">
        <div class="form-group">
            <label for="data_nascimento" class="control-label">Data Nascimento:</label> 
            <input type="text" 
                   name="data_nascimento" 
                   id="data_nascimento"
                   value="{{ isset( $registro->data_nascimento) ? date('d/m/Y', strtotime($registro->data_nascimento )) : ''  }}" 
                   class="form-control" />

        </div>
    </div>
    <div class="col-xs-12 col-sm-3 col-md-3">
        <div class="form-group">
            <label for="rg" class="control-label">RG:</label> 
            <input type="text" 
                   name="rg" 
                   id="rg"
                   value="{{ isset( $registro->rg ) ? $registro->rg : ''  }}" 
                   class="form-control" />

        </div>
    </div>
    <div class="col-xs-12 col-sm-3 col-md-3">
        <div class="form-group">
            <label for="cpf" class="control-label">CPF:</label> 
            <input type="text" 
                   name="cpf" 
                   id="cpf"
                   value="{{ isset( $registro->cpf ) ? $registro->cpf : '' }}"
                   class="form-control" />

        </div>
    </div>
    <div class="col-xs-12 col-sm-3 col-md-3">
        <div class="form-group">
            <label for="sexo" class="control-label">SEXO:</label>
            <select type="text" name="sexo" id="sexo" class="form-control ">
                @if ( isset($registro->sexo) ) 
                    <option value="">Selecione o Sexo</option> 
                    <option value="F" {{ $registro->sexo === 'F' ? 'selected' : '' }}>Feminino</option>
                    <option value="M" {{ $registro->sexo === 'M' ? 'selected' : '' }}>Masculino</option>
                @else
                    <option value="">Selecione o Sexo</option> 
                    <option value="F" >Feminino</option>
                    <option value="M" >Masculino</option>
                @endif
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="endereco" class="control-label">Endereço:</label> 
            <input type="text" 
                   name="endereco" 
                   id="endereco"
                   value="{{ isset( $registro->endereco ) ? $registro->endereco : '' }}"
                   class="form-control" />

        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="cidade" class="control-label">Cidade:</label> 
            <input type="text" 
                   name="cidade" 
                   id="cidade"
                   value="{{ isset( $registro->cidade ) ? $registro->cidade : ''  }}" 
                   class="form-control" />

        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="bairro" class="control-label">Bairro:</label> 
            <input type="text" 
                   name="bairro" 
                   id="bairro"
                   value="{{ isset( $registro->bairro ) ? $registro->bairro : '' }}" 
                   class="form-control" />
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="cep" class="control-label">Cep:</label> 
            <input type="text" 
                   name="cep" 
                   id="cep"
                   value="{{ isset( $registro->cep ) ? $registro->cep : '' }}" 
                   class="form-control" />

        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label for="email" class="control-label">E-mail:</label> 
            <input type="text" 
                   name="email" 
                   id="email"
                   value="{{ isset( $registro->email )  ? $registro->email : ''  }}" 
                   class="form-control" />
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="telefone_celular" class="control-label">Celular:</label> 
            <input type="text" 
                   name="telefone_celular" 
                   id="telefone_celular"
                   value="{{ isset( $registro->telefone_celular ) ? $registro->telefone_celular : '' }}" 
                   class="form-control" />
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="telefone_fixo" class="control-label">Fixo:</label> 
            <input type="text" 
                   name="telefone_fixo" 
                   id="telefone_fixo"
                   value="{{ isset( $registro->telefone_fixo ) ? $registro->telefone_fixo : '' }}" 
                   class="form-control" />
         
        </div>
    </div>
</div>

