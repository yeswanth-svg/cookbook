@extends('layouts.app')
@section('title', 'Contact us')
@section('content')
@include('layouts.nav')

<div class="uk-section uk-section-default uk-padding-remove-top">
    <div class="uk-container">
        <div class="uk-grid-large" data-uk-grid>
            <div class="uk-width-1-2@m uk-flex uk-flex-middle">
                <div>
                    <h1 class="uk-margin-bottom">Hello, what's on your mind?</h1>

                    <a href="#" class="uk-button uk-button-primary uk-margin-top">Schedule a call</a>
                </div>
            </div>
            <div class="uk-width-1-2@m">
                <div class="uk-background-primary uk-border-rounded-large uk-light uk-padding uk-margin-top">
                    <form class="uk-form-stacked">
                        <div class="uk-margin-bottom">
                            <label class="uk-form-label" for="name">Name</label>
                            <div class="uk-form-controls">
                                <input id="name" class="uk-input uk-border-pill" name="name" type="text" required>
                            </div>
                        </div>
                        <div class="uk-margin-bottom">
                            <label class="uk-form-label" for="_replyto">Email</label>
                            <div class="uk-form-controls">
                                <input id="_replyto" class="uk-input uk-border-pill" name="_replyto" type="email"
                                    required>
                            </div>
                        </div>
                        <div class="uk-margin-bottom">
                            <label class="uk-form-label" for="message">Message</label>
                            <div class="uk-form-controls">
                                <textarea id="message" class="uk-textarea uk-border-rounded-large" name="message"
                                    rows="5" minlength="10" required></textarea>
                            </div>
                        </div>
                        <div class="uk-text-center">
                            <input class="uk-button uk-button-warning uk-border-pill" type="submit"
                                value="Send Message">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection