@extends('layouts.app')

@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.6/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.6/css/froala_style.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/css/selectize.min.css" rel="stylesheet" type="text/css" />

    <section class="section">
        <div class="container">
            <div class="columns ">
                <div class="column is-three-fifths is-offset-one-fifth">
                    <h4 class="title is-4">Création d'une Association</h4>
                    <h6 class="subtitle is-6"></h6>

                    {{ Form::open(['route' => 'team.create', 'method' => 'post']) }}

                    <div class="field">
                        {{ Form::label('name', 'Nom de l\'association', ['class' => 'label']) }}
                        <div class="control">
                            {{ Form::text('name', null, ['id' => 'name', 'class' => 'input is-medium', 'placeholder' => 'Chineurs de ...']) }}
                        </div>
                        <p class="help">Pour créer une association, veillez à écrire "Chineurs de ..." pour le nom. Celui-ci est <b>non modifiable</b> après la création de l'association.</p>
                    </div>

                    <div class="field">
                        {{ Form::label('facebook_url', 'Page Facebook de l\'association', ['class' => 'label']) }}
                        <div class="control">
                            {{ Form::text('facebook_url', null, ['id' => 'facebook_url', 'class' => 'input', 'placeholder' => 'ex: http://facebook.com/chineursdelille/']) }}
                        </div>
                        <p class="help">Champs non-obligatoire mais fortement conseillé.</p>
                    </div>

                    <div class="field">
                        {{ Form::label('about', 'Informations', ['class' => 'label']) }}
                        <div class="control">
                            {{ Form::textarea('about', null, ['id' => 'about', 'class' => 'textarea', 'placeholder' => 'Informations relatives à votre association.']) }}
                        </div>
                        <p class="help">Vous pouvez ici détailler toutes les informations relatives à votre association (noms et rôles des membres, liens réseaux sociaux, ...) Cette section sera visible par tous les utilisateurs validés. Elle est modificable par la suite.</p>
                    </div>

                    <div class="field">
                        {{ Form::label('availableUsers', 'Inviter des utilisateurs', ['class' => 'label']) }}
                        <div class="select is-multiple">
                            <select multiple size="5" id="availableUsers" name="availableUsers[]">
                                @foreach($availableUsers as $availableUser)
                                    <option value="{!! $availableUser->id !!}">
                                        {!! $availableUser->name !!}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <p class="help">Vous pouvez directement inviter des utilisateurs à vous rejoindre (entrez leur nom et/ou sélectionnez les via la liste déroulante), ou alors le faire par la suite.</p>
                    </div>

                    <div class="field is-grouped is-grouped-centered">
                        <p class="control">
                            {{ Form::submit('Valider', ['class' => 'button is-primary']) }}
                        </p>
                        <p class="control">
                            {{ Form::reset('Réinitialiser', ['class' => 'button is-white']) }}
                        </p>
                    </div>

                    {{ Form::close() }}


                    {{--<form method="post">

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
                            <label class="label" for="name">Nom de l'association</label>
                            <div class="control">
                                <input class="input is-medium" id="name" name="name" type="text" placeholder="Chineurs de ..." required>
                            </div>
                            <p class="help">Pour créer une association, veillez à écrire "Chineurs de ..." pour le nom. Celui-ci est <b>non modifiable</b> après la création de l'association.</p>
                        </div>

                        <div class="field">
                            <label class="label" for="facebook_url">Page Facebook de l'association</label>
                            <div class="control">
                                <input class="input" id="facebook_url" name="facebook_url" type="text" placeholder="ex: http://facebook.com/chineursdelille/">
                            </div>
                            <p class="help">Champs non-obligatoire mais fortement conseillé.</p>
                        </div>

                        <div class="field">
                            <label class="label" for="about">Informations</label>
                            <div class="control">
                                <textarea class="textarea" id="about" name="about" placeholder="Informations relatives à votre association."></textarea>
                            </div>
                            <p class="help">Vous pouvez ici détailler toutes les informations relatives à votre association (noms et rôles des membres, liens réseaux sociaux, ...) Cette section sera visible par tous les utilisateurs validés. Elle est modificable par la suite.</p>
                        </div>

                        <div class="field">
                            <label class="label" for="availableUsers">Inviter des utilisateurs</label>
                            <div class="select is-multiple">
                                <select multiple size="5" id="availableUsers" name="availableUsers[]">
                                    @foreach($availableUsers as $availableUser)
                                        <option value="{!! $availableUser->id !!}">
                                            {!! $availableUser->name !!}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <p class="help">Vous pouvez directement inviter des utilisateurs à vous rejoindre (entrez leur nom et/ou sélectionnez les via la liste déroulante), ou alors le faire par la suite.</p>
                        </div>


                        <div class="field is-grouped is-grouped-centered">
                            <p class="control">
                                <input class="button is-primary" type="submit" value="Valider">
                            </p>
                            <p class="control">
                                <input class="button is-white" type="reset" value="Réinitialiser">
                            </p>
                        </div>

                    </form>--}}
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