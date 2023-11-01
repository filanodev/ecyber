@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.modePaiement.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.mode-paiements.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('countries') ? 'has-error' : '' }}">
                            <label for="countries">{{ trans('cruds.modePaiement.fields.country') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="countries[]" id="countries" multiple>
                                @foreach($countries as $id => $country)
                                    <option value="{{ $id }}" {{ in_array($id, old('countries', [])) ? 'selected' : '' }}>{{ $country }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('countries'))
                                <span class="help-block" role="alert">{{ $errors->first('countries') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.modePaiement.fields.country_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('slog') ? 'has-error' : '' }}">
                            <label for="slog">{{ trans('cruds.modePaiement.fields.slog') }}</label>
                            <input class="form-control" type="text" name="slog" id="slog" value="{{ old('slog', '') }}">
                            @if($errors->has('slog'))
                                <span class="help-block" role="alert">{{ $errors->first('slog') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.modePaiement.fields.slog_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('libelle') ? 'has-error' : '' }}">
                            <label class="required" for="libelle">{{ trans('cruds.modePaiement.fields.libelle') }}</label>
                            <input class="form-control" type="text" name="libelle" id="libelle" value="{{ old('libelle', '') }}" required>
                            @if($errors->has('libelle'))
                                <span class="help-block" role="alert">{{ $errors->first('libelle') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.modePaiement.fields.libelle_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                            <label for="description">{{ trans('cruds.modePaiement.fields.description') }}</label>
                            <textarea class="form-control ckeditor" name="description" id="description">{!! old('description') !!}</textarea>
                            @if($errors->has('description'))
                                <span class="help-block" role="alert">{{ $errors->first('description') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.modePaiement.fields.description_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('logos') ? 'has-error' : '' }}">
                            <label for="logos">{{ trans('cruds.modePaiement.fields.logos') }}</label>
                            <div class="needsclick dropzone" id="logos-dropzone">
                            </div>
                            @if($errors->has('logos'))
                                <span class="help-block" role="alert">{{ $errors->first('logos') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.modePaiement.fields.logos_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.modePaiement.fields.status') }}</label>
                            <select class="form-control" name="status" id="status">
                                <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\ModePaiement::STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('status', '2') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('status'))
                                <span class="help-block" role="alert">{{ $errors->first('status') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.modePaiement.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('api_key') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="api_key" value="0">
                                <input type="checkbox" name="api_key" id="api_key" value="1" {{ old('api_key', 0) == 1 ? 'checked' : '' }}>
                                <label for="api_key" style="font-weight: 400">{{ trans('cruds.modePaiement.fields.api_key') }}</label>
                            </div>
                            @if($errors->has('api_key'))
                                <span class="help-block" role="alert">{{ $errors->first('api_key') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.modePaiement.fields.api_key_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('site_token') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="site_token" value="0">
                                <input type="checkbox" name="site_token" id="site_token" value="1" {{ old('site_token', 0) == 1 ? 'checked' : '' }}>
                                <label for="site_token" style="font-weight: 400">{{ trans('cruds.modePaiement.fields.site_token') }}</label>
                            </div>
                            @if($errors->has('site_token'))
                                <span class="help-block" role="alert">{{ $errors->first('site_token') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.modePaiement.fields.site_token_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('notify_url') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="notify_url" value="0">
                                <input type="checkbox" name="notify_url" id="notify_url" value="1" {{ old('notify_url', 0) == 1 ? 'checked' : '' }}>
                                <label for="notify_url" style="font-weight: 400">{{ trans('cruds.modePaiement.fields.notify_url') }}</label>
                            </div>
                            @if($errors->has('notify_url'))
                                <span class="help-block" role="alert">{{ $errors->first('notify_url') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.modePaiement.fields.notify_url_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('return_url') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="return_url" value="0">
                                <input type="checkbox" name="return_url" id="return_url" value="1" {{ old('return_url', 0) == 1 ? 'checked' : '' }}>
                                <label for="return_url" style="font-weight: 400">{{ trans('cruds.modePaiement.fields.return_url') }}</label>
                            </div>
                            @if($errors->has('return_url'))
                                <span class="help-block" role="alert">{{ $errors->first('return_url') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.modePaiement.fields.return_url_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.mode-paiements.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $modePaiement->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

<script>
    var uploadedLogosMap = {}
Dropzone.options.logosDropzone = {
    url: '{{ route('admin.mode-paiements.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="logos[]" value="' + response.name + '">')
      uploadedLogosMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedLogosMap[file.name]
      }
      $('form').find('input[name="logos[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($modePaiement) && $modePaiement->logos)
      var files = {!! json_encode($modePaiement->logos) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="logos[]" value="' + file.file_name + '">')
        }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}

</script>
@endsection