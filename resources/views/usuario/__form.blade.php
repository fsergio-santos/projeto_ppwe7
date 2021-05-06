@include('layouts.validacao')

<div class="row">
   <div class="col-sm-4">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <div id="drop-zone">
                        <div id="fotoBanco">
                            
                            @if (isset($registro->profile_pic))
                                 <input type="hidden" id="profile_pic" name="profile_pic" 
                                    value="{{ $registro->profile_pic  }}" />
                                <img src="{{ url('/imagem', $registro->profile_pic) }}" class="avatar" />
                            @else
                                <img id="imageUpload" src="{{ url('/imagem', 'boy.png') }}" class="avatar" />
                            @endif
                        </div>
                        <div id="clickHereLeft" style="float:left;">
                            <div style="text-align: center;">
                                <label for="fileInput"><i class="fa fa-upload fa-lg" ></i></label>
                            </div>
                            <input type="file" accept=".jpg,.jpeg,.png" id="fileInput"
                                class="form-control hide btn-responsive">
        
                        </div>
                        <div id="clickHereRight" style="float:right;">
                            <div style="text-align: center;">
                                <label for="fileExcluir"><i class="fa fa-trash fa-lg"></i></label>
                            </div>
                            <input type="button" id="fileExcluir" class="form-control hide btn-responsive">
     
                        </div>
                    </div>
                </div>     
            </div>    
        </div>        
   </div>
   <div class="col-sm-8">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="name" class="control-label">Nome:</label> 
                    <input type="text" 
                           name="name" 
                           id="name"
                           value="{{ isset( $registro->name ) ? $registro->name : ''  }}" 
                           class="form-control @error('name') is-invalid @enderror" />
                           @error('name')
                                <div class="invalid-feedback">
                                    <span><strong>{{ $message }}</strong></div>
                                </div>
                           @enderror
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
                           value="{{ isset( $registro->email ) ? $registro->email : ''  }}" 
                           class="form-control @error('email') is-invalid @enderror" />
                           @error('email')
                                <div class="invalid-feedback">
                                    <span><strong>{{ $message }}</strong></div>
                                </div>
                           @enderror
                </div>
            </div> 
        </div> 
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="password" class="control-label">Senha:</label> 
                    <input type="password" 
                           name="password" 
                           id="password"
                           value="{{ isset( $registro->password ) ? $registro->password : ''  }}" 
                           class="form-control @error('password') is-invalid @enderror" />
                           @error('password')
                                <div class="invalid-feedback">
                                    <span><strong>{{ $message }}</strong></div>
                                </div>
                           @enderror
                </div>
            </div>    
        </div>   
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="password_confirm" class="control-label">Senha:</label> 
                    <input type="password" 
                           name="password_confirm" 
                           id="password_confirm"
                           class="form-control @error('password_confirm') is-invalid @enderror" />
                           @error('password_confirm')
                                <div class="invalid-feedback">
                                    <span><strong>{{ $message }}</strong></div>
                                </div>
                           @enderror
                </div>
            </div>    
        </div>    
   </div> 
   <input type="hidden" name="id" id="id" value="{{ isset( $registro->id ) ? $registro->id : ''  }}"/>
</div>
@section('javascript')

  <script>


        $("#fileInput").change(function(e){
           e.preventDefault();
           enviarFoto(this);
        });

        $("#fileExcluir").click(function(e){
           e.preventDefault();
           excluirFoto(this);
        });

          //preparar um pacote
        function enviarFoto(input){
          
          if (input.files && input.files[0]){
              var reader = new FileReader();
              var filename = $('#fileInput').val();
              filename = filename.substring(filename.lastIndexOf('\\')+1);
              reader.onload = function(e){
                  $('#imageUpload').attr('src', e.target.result);
                  $('#imageUpload').hide();
                  $('#imageUpload').fadeIn(500);
              }
              reader.readAsDataURL(input.files[0])
              sendToServer(input.files[0])
          }
     
        }


        function sendToServer(foto){
            var formData = new FormData();
            formData.append('image',foto);
            formData.append('id',$('#id').val());
            $.ajax({
                url: "{{ url('/store') }}",
                method: 'POST',
                data:formData,
                dataType:'JSON',
                cache:false, 
                contentType:false,
                processData: false,
                beforeSend: function(xhr, type) {
                    if (!type.crossDomain) {
                        xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
                    }
                },
                success : function(response){
                    console.log(response.nomeArquivo);
                    $('#profile_pic').val(response.nomeArquivo);
                },
                error:function(data){
                    console.log("erro de upload "+data)
                    //alert(data)

                }
            })   
            
        }

        function excluirFoto(e){
            console.log($('#profile_pic').val())
            $.ajax({
                url: "{{ url('/imagem/excluir') }}",
                // url: "{{ route('imagem.excluir') }}"
                type:"POST",
                data:{
                    image: $('#profile_pic').val()
                },
                beforeSend: function(xhr, type) {
                    if (!type.crossDomain) {
                        xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
                    }
                },
                success: function(response){
                    console.log(response.nomeArquivo);
                    $('#profile_pic').val('');
                    //document.getElementById("imageUpload").html('<img id="imageUpload" src="{{ url("/imagem", "boy.png") }}" class="avatar" />')
                    var elemento = document.getElementById("imageUpload");

                    console.log(elemento);

                   // elemento.src = "{{ url('/imagem', 'boy.png') }}";
                   // elemento.html('<img id="imageUpload" src="{{ url("/imagem", "boy.png") }}" class="avatar" />');

                    $('#profile_pic').val(response.nomeArquivo);
                },
                error:function(response){
                    console.log("erro de exclusão");
                    document.getElementById('imageUpload').src = "{{ url('/imagem', 'boy.png') }}";
                    $('#profile_pic').val(response.nomeArquivo);
               }

            })

        }

  

  </script> 
    
@endsection



























