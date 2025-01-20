<footer class="main-footer">
    <div class="float-right d-none d-sm-block">

        <a id="back-to-top" href="#" class="btn-sm" role="button" aria-label="Scroll to top">
            <i class="fas fa-chevron-up"></i>
        </a>
    </div>
    <div class="float-right d-none d-sm-block">
        <b><code> Hak.</b>v{{ $bootSettings['hak_version'] }}</code><strong>/</strong>
        <b>App v</b> {{ $bootSettings['app_version'] }}
    </div>
    Copyright &copy; {{ $bootSettings['developer_app_starting_year'] }}-<?php echo date('Y'); ?>
    <strong>{{ $bootSettings['app_name'] }}</strong> All rights reserved.<strong> Developed by <a
            href="{{ $bootSettings['developer_company_website'] }}"
            target="_blank">{{ $bootSettings['developer_company_name'] }}</a>.</strong>

</footer>
