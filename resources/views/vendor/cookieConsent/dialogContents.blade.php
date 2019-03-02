
<!--div class="modal fade" id="cookiemodal" tabindex="1" role="dialog" aria-hidden="true">
<div class="js-cookie-consent cookie-consent border border-primary mt-auto">

    <span class="cookie-consent__message">
        {!! trans('cookieConsent::texts.message') !!}
    </span>

    <button class="js-cookie-consent-agree cookie-consent__agree btn btn-primary">
        {{ trans('cookieConsent::texts.agree') }}
    </button>

</div>

</div -->

<div class="modal fade" id="cookiemodal" tabindex="1" role="dialog" aria-hidden="true">
    <div class="modal-dialog js-cookie-consent cookie-consent" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="model-title">Cookie bericht</h4>
            </div>
            <div class="modal-body">
                <p> {!! trans('cookieConsent::texts.message') !!} </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Sluiten</button>
                <button type="button" class="js-cookie-consent-agree cookie-consent__agree btn btn-primary"> {{ trans('cookieConsent::texts.agree') }}</button>
            </div>
        </div>
    </div>
</div> 

