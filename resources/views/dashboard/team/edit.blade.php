@extends('layouts.app')

@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.6/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.6/css/froala_style.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/css/selectize.min.css" rel="stylesheet" type="text/css" />

    <section class="section">
        <div class="container">
            <div class="columns ">
                <div class="column is-three-fifths is-offset-one-fifth">
                    <h4 class="title is-4">{!! $team->name !!}</h4>
                    <h6 class="subtitle is-6"><i>Editez les informations relatives à votre association.</i></h6>

                    <form method="post">

                        @if($errors->all())
                            <div class="notification is-danger">
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif

                        @if (session('status'))
                            <div class="notification is-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">

                        <div class="field">
                            <label class="label" for="facebook_url">Page Facebook de l'association</label>
                            <div class="control">
                                <input class="input" id="facebook_url" name="facebook_url" type="text" placeholder="ex: http://facebook.com/chineursdelille/" value="{!! $team->facebook_url !!}">
                            </div>
                            <p class="help">Champs non-obligatoire mais fortement conseillé.</p>
                        </div>

                        <div class="field">
                            <label class="label" for="about">Informations</label>
                            <div class="control">
                                <textarea class="textarea" id="about" name="about" placeholder="Informations relatives à votre association.">{!! $team->about !!}</textarea>
                            </div>
                            <p class="help">Vous pouvez ici détailler toutes les informations relatives à votre association. Cette section sera visible par tous les utilisateurs validés.</p>
                        </div>


                        <div class="field is-grouped is-grouped-centered">
                            <p class="control">
                                <input class="button is-primary" type="submit" value="Valider">
                            </p>
                            <p class="control">
                                <input class="button is-white" type="reset" value="Réinitialiser">
                            </p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.6/js/froala_editor.pkgd.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/js/standalone/selectize.min.js"></script>
    <script>
        $(document).ready(function() {
            $('textarea').froalaEditor({
                heightMin: 200,
                language: 'fr',
                toolbarSticky: false,
                placeholderText: '',
                quickInsertButtons: [],
                toolbarButtons: ['bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', '|', 'fontFamily', 'fontSize', 'color', 'paragraphStyle', '|', 'paragraphFormat', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', 'quote', '-', 'insertLink', 'embedly', 'insertTable', '|', 'specialCharacters', 'insertHR', 'selectAll', 'clearFormatting']
            });
            $('select').selectize();
        });
    </script>
@endsection