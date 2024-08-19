@extends('layouts.app') @section('title', 'CMS | Menu-Management') @section('contentbody')
<!-- Main content -->
<link rel="stylesheet" href="{{ asset('css/intlTelInput_text.css') }}">
<style>
    .p-error1 {
        text-align: left;
    }

    /* .newbtn p {
  left: 15px!important;
 } */
    .newbtn2 {
        left: 0 !important;
    }

    .none {
        display: none;
    }

    .round-off {
        float: left;
        margin: 0;
        border: 1px solid #ccc;
        width: 90%;
        height: 34px;
        line-height: 34px;
        padding-left: 8px;
        pointer-events: none;
        cursor: no-drop;
    }

    .collapsest {
        height: 0px;
        overflow: hidden;
    }

    .inst {
        opacity: 1;
        height: auto;
    }

    .ebill-error {
        text-align: left;
        padding-top: 6px;
    }

    .p-sub-error {
        text-align: none !important;
    }

    .p-sub-error {
        right: 26px;
    }

    .ebill-span {
        top: 34px;
        left: 26px;
    }

    .panel-ebill-set {
        padding: 20px 0px 20px 15px;
    }

    .update-next[readonly] {
        background-color: #eee !important;
    }

    .loading-data {
        z-index: 9999;
    }

    .popup {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #fcfafa;
        padding: 15px;
        border: 1px solid #cccccc4d;
        z-index: 9999;
        width: 432px;
    }

    .button-container {
        display: flex;
        justify-content: flex-end;
    }

    .button-container button {
        display: right_side;
    }

    .remove-table-btn {
        border: none;
        background-color: transparent;
        color: red;
        font-size: 18px;
        cursor: pointer;
    }

    .remove-table-btn::after {
        content: "";
        position: absolute;
        top: 0;
        right: 0;
        width: 20px;
        height: 20px;
        background: url('path_to_cross_icon.png') center center no-repeat;
        background-size: contain;
    }

    .dynamic_clearimage_set {
        position: absolute;
        top: -13px;
        right: -6px;
        color: #fff;
        background: #f00;
        width: 16px;
        height: 16px;
        text-align: center;
        border-radius: 50%;
        font-size: 12px;
        cursor: pointer;
    }

    .add-append-text {
        margin-bottom: 14px;
    }

    .company-set:before {
        border-color: #d0d0d0 !important;
        background-color: #c0c2c6 !important;
        cursor: not-allowed !important;
    }

    .dot {
        height: 11px;
        width: 13px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        text-align: center;
    }

    .wh-text-set {
        font-size: 12px;
        position: absolute;
        padding-left: 15px;
        padding-top: 6px;
    }

    .wh-text-set i {
        width: 14px;
        height: 14px;
        background: #767676;
        color: #fff;
        text-align: center;
        border-radius: 50%;
        font-size: 10px;
        line-height: 14px;
        margin-right: 4px;
    }

    .iti {
        width: 100%;
    }

    .logo-set-permission span {
        font-size: 16px;
        margin-left: 4px;
        margin-top: -2px;
        position: absolute;
    }

    .logo-set-permission {
        position: relative;
    }

    .ebill-sub-wt label {
        width: 100% !important;
    }

    #sp_comp_dtls_error {
        text-align: center;
        display: block;
        color: #f00;
        font-size: 12px;
    }

    .chkbox_disabled {
        pointer-events: none;
    }

    .subaccount_employeeview {
        pointer-events: none;
        opacity: 0.8;
        cursor: no-drop;
    }

    .popup:before {
        content: "";
    }

    .popup button {
        background: #3b86ff;
        border: 0;
        color: #fff;
        font-size: 14px;
        border-radius: 4px;
        padding: 5px 16px 6px 16px;
        float: right;
    }

    .popup h2 {
        margin: 0px;
        font-size: 18px;
        text-align: center;
        border-bottom: 1px solid #f4f4f4;
        padding-bottom: 15px;
        margin-bottom: 15px;
        color: #000;
    }

    .popup span {
        position: absolute;
        right: 14px;
        top: 14px;
        font-size: 20px;
        font-weight: 700;
        line-height: 1;
        color: #000;
        text-shadow: 0 1px 0 #fff;
        filter: alpha(opacity=20);
        opacity: .2;
        cursor: pointer;
    }

    hr {
        margin-top: 10px;
        margin-bottom: 10px;
        border: 0;
        border-top: 1px solid #eee;
    }

    .popup label[for=double_banner] {
        margin-bottom: 18px;
    }

    .popup_div {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 1040;
        background-color: #00000070;
    }
</style>
<section class="content">
    <div class="row">
        <div class="loading-data" style="display:none; color: #fff;">Loading&#8230;</div>
        <div class="section-banner">
            <div class="col-md-12">
                <p class="login-box-msg" style="padding: 0px;">
                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissable">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ Session::get('success') }}
                        </div>
                    @elseif(Session::has('error'))
                        <div class="alert alert-error alert-dismissable">
                            <a href="javascript:void(0)" class="close" data-dismiss="alert"
                                aria-label="close">&times;</a>
                            {{ Session::get('error') }}
                        </div>
                    @endif
                </p>
                <div class="back-body back-body-custom-home">
                    <div class="back-head">
                        <div class="col-xs-9">
                            <h4 style="margin-top: 6px;">eBill Structure</h4>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div
                        class="main-body-inner @if ($login_type == 2) {{ 'subaccount_employeeview' }} @endif">
                        <form id="ebill_structure_id" enctype="multipart/form-data" autocomplete="off">
                            <span class="category-error" id="ebill_output_id"></span>
                            {{ csrf_field() }}
                            <input type="hidden" name="input_apply_multiple_company" id="input_apply_multiple_company"
                                value="0">
                            <div class="home-screen-accordion" style="padding-top: 0px;">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default" style="position:relative">
                                        <div class="panel-heading panel-heading-ebill" role="tab">
                                            <h4 class="panel-title">
                                                <div class="col-xs-4 no-padding">
                                                    <label class="pure-material-checkbox">
                                                        <input id="toolbar_permission_id" class="all-enteradd"
                                                            type="checkbox" onclick="toolbar_permission_validation();"
                                                            value="1" name="toolbar_permission"
                                                            {{ $ebillStructure->toolbar_permission == 1 ? 'checked' : '' }}>
                                                        <span>Toolbar</span>
                                                    </label>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </h4>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div id="collapseOne" class="toolbar_collapse panel-collapse collapse in">
                                            <div class="panel-body panel-body-toolbar">
                                                <div class="panel-ebill">
                                                    <div class="row">
                                                        <div class="ebill-sub-panel">
                                                            <div class="col-md-4 dv_Lnk">
                                                                <div class="col-md-10 no-padding-left">
                                                                    <label class="pure-material-checkbox">
                                                                        <input id="home_permission_id"
                                                                            class="all-enteradd" type="checkbox"
                                                                            name="home_permission" value="1"
                                                                            {{ $ebillStructure->home_permission == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <div class="ebill-sub-custom">
                                                                        <input type="text"
                                                                            class="form-control all-enteradd clLink"
                                                                            placeholder="Home Link" name="home_link"
                                                                            maxlength="50"
                                                                            value="{{ $ebillStructure->home_link }}">
                                                                    </div>
                                                                    <span class="category-error"
                                                                        id="home_linkerror"></span>
                                                                </div>
                                                                <div class="col-md-2 ebill-set no-padding">
                                                                    @if ($merchant->ebill_version == 1)
                                                                        <input type="text" placeholder="Priority"
                                                                            id="home_priority_id"
                                                                            class="form-control toolbar_prio_cls all-enteradd"
                                                                            name="home_priority"
                                                                            onkeypress="return isNumberKey(event);"
                                                                            maxlength="1"
                                                                            value="{{ $ebillStructure->home_priority }}">
                                                                        <span id="home_priorityerror"></span>
                                                                    @endif
                                                                </div>

                                                            </div>
                                                            <div class="col-md-4 dv_Lnk">
                                                                <div class="col-md-10 no-padding-left">
                                                                    <label class="pure-material-checkbox">
                                                                        <input id="login_permission_id"
                                                                            class="all-enteradd" type="checkbox"
                                                                            name="login_permission" value="1"
                                                                            {{ $ebillStructure->login_permission == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <div class="ebill-sub-custom">
                                                                        <input type="text"
                                                                            class="form-control all-enteradd clLink"
                                                                            id="login_link_id"
                                                                            placeholder="Login Link" name="login_link"
                                                                            maxlength="50"
                                                                            value="{{ $ebillStructure->login_link }}">
                                                                    </div>
                                                                    <span class="category-error"
                                                                        id="login_linkerror"></span>
                                                                </div>
                                                                <div class="col-md-2 ebill-set no-padding">
                                                                    <input type="text" placeholder="Priority"
                                                                        id="login_priority_id"
                                                                        class="form-control toolbar_prio_cls all-enteradd"
                                                                        name="login_priority"
                                                                        onkeypress="return isNumberKey(event);"
                                                                        maxlength="1"
                                                                        value="{{ $ebillStructure->login_priority }}">
                                                                    <span class=""
                                                                        id="login_priorityerror"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 dv_Lnk">
                                                                <div class="col-md-8 no-padding-left">
                                                                    <label class="pure-material-checkbox">
                                                                        <input id="menu_permission_id"
                                                                            class="all-enteradd" type="checkbox"
                                                                            name="menu_permission" value="1"
                                                                            {{ $ebillStructure->menu_permission == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <div class="ebill-sub-custom">
                                                                        <input type="text"
                                                                            class="form-control all-enteradd clLink"
                                                                            placeholder="Menu Link" name="menu_link"
                                                                            maxlength="50"
                                                                            value="{{ $ebillStructure->menu_link }}">
                                                                    </div>
                                                                    <span class="category-error"
                                                                        id="menu_linkerror"></span>
                                                                </div>
                                                                <div class="col-md-4 ebill-set no-padding">
                                                                    <input type="text" placeholder="Priority"
                                                                        id="menu_priority_id"
                                                                        class="form-control toolbar_prio_cls all-enteradd"
                                                                        name="menu_priority"
                                                                        onkeypress="return isNumberKey(event);"
                                                                        maxlength="1"
                                                                        value="{{ $ebillStructure->menu_priority }}">
                                                                    <span id="menu_priorityerror"></span>
                                                                </div>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>

                                                        <div class="ebill-sub-panel">
                                                            <div class="col-md-4">
                                                                <div class="col-md-10 no-padding-left">
                                                                    <label class="pure-material-checkbox">
                                                                        <input id="share_permission_id"
                                                                            class="all-enteradd" type="checkbox"
                                                                            name="share_permission" value="1"
                                                                            {{ $ebillStructure->share_permission == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <p class="round-off">Share</p>
                                                                </div>
                                                                <div class="col-md-2 ebill-set no-padding">
                                                                    <input type="text" placeholder="Priority"
                                                                        id="share_priority_id"
                                                                        class="form-control toolbar_prio_cls all-enteradd"
                                                                        name="share_priority"
                                                                        onkeypress="return isNumberKey(event);"
                                                                        maxlength="1"
                                                                        value="{{ $ebillStructure->share_priority }}">
                                                                    <span id="share_priorityerror"></span>
                                                                </div>
                                                            </div> 
                                                            <div class="col-md-4">
                                                                <div class="col-md-12 no-padding">
                                                                    <label class="pure-material-checkbox">
                                                                        <input id="save_permission_id"
                                                                            class="all-enteradd" type="checkbox"
                                                                            name="save_permission" value="1"
                                                                            {{ $ebillStructure->save_permission == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <p class="round-off">Save</p>
                                                                </div>
                                                                {{--<div class="col-md-2 ebill-set no-padding">
                                                                     <input type="text" placeholder="Priority" id="save_priority_id" class="form-control toolbar_prio_cls all-enteradd" name="save_priority" onkeypress="return isNumberKey(event);" maxlength="1" value="{{$ebillStructure->save_priority}}">
																	<span id="save_priorityerror"></span> 
                                                                </div>--}}
                                                            </div>
                                                            <div class="col-md-4 dv_Lnk">
                                                                <div class="col-md-8 no-padding-left">
                                                                    <label class="pure-material-checkbox">
                                                                        <input id="website_permission_id"
                                                                            class="all-enteradd" type="checkbox"
                                                                            name="website_permission" value="1"
                                                                            {{ $ebillStructure->website_permission == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <div class="ebill-sub-custom">
                                                                        <input type="text"
                                                                            class="form-control all-enteradd clLink"
                                                                            placeholder="Website Link"
                                                                            name="website_link" maxlength="50"
                                                                            value="{{ $ebillStructure->website_link }}">
                                                                    </div>
                                                                    <span class="category-error"
                                                                        id="website_linkerror"></span>
                                                                </div>
                                                                <div class="col-md-4 ebill-set no-padding">
                                                                    <input type="text" placeholder="Priority"
                                                                        id="website_priority_id"
                                                                        class="form-control toolbar_prio_cls all-enteradd"
                                                                        name="website_priority"
                                                                        onkeypress="return isNumberKey(event);"
                                                                        maxlength="1"
                                                                        value="{{ $ebillStructure->website_priority }}">
                                                                    <span id="website_priorityerror"></span>
                                                                </div>
                                                            </div>

                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div class="ebill-sub-panel">
                                                            <div class="col-md-4">
                                                                <label class="pure-material-checkbox">
                                                                    <input id="transaction_history_permission"
                                                                        class="all-enteradd" type="checkbox"
                                                                        name="transaction_history_permission"
                                                                        value="1"
                                                                        {{ $ebillStructure->transaction_history_permission == 1 ? 'checked' : '' }}>
                                                                    <span></span>
                                                                </label>
                                                                <p class="round-off">Transaction history</p>

                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="pure-material-checkbox">
                                                                    <input id="verify_bill_permission"
                                                                        class="all-enteradd" type="checkbox"
                                                                        name="verify_bill_permission" value="1"
                                                                        {{ $ebillStructure->verify_bill_permission == 1 ? 'checked' : '' }}>
                                                                    <span></span>
                                                                </label>
                                                                <p class="round-off">Verify Bill</p>

                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>

                                                        <span class="category-error"
                                                            id="toolbar_permissionerror"></span>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading panel-heading-ebill" role="tab">
                                            <h4 class="panel-title">
                                                <div class="col-xs-4 no-padding">
                                                    <label style="margin: 0;font-weight: normal;">eBill Template
                                                        Name</label>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </h4>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class=" panel-collapse collapse in">
                                            <div class="panel-body">
                                                <div class="panel-ebill">
                                                    <div class="row">
                                                        <div class="ebill-sub-panel">
                                                            <div class="col-md-4">
                                                                <div class="col-md-10 no-padding">
                                                                    <div class="ebill-sub-custom">
                                                                        <input type="text"
                                                                            value="{{ $ebillStructure->template_name }}"
                                                                            class="form-control all-enteradd"
                                                                            placeholder="Template Name"
                                                                            name="template_name" maxlength="100">
                                                                        <span class="category-error p-error1"
                                                                            id="template_nameerror"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($merchant->ebill_version == 2)
                                        <div class="panel panel-default">
                                            <div class="panel-heading panel-heading-ebill" role="tab">
                                                <h4 class="panel-title">
                                                    <div class="col-xs-4 no-padding">
                                                        <label class="pure-material-checkbox">
                                                            <input type="hidden" name="id"
                                                                value="{{ $ebillStructure->id }}">
                                                            <input type="hidden" name="outletid"
                                                                value="{{ $outletid }}">
                                                            <input id="logo_permission_id" class="all-enteradd"
                                                                onclick="logo_permission_validation();"
                                                                type="checkbox" name="logo_permission" value="1"
                                                                {{ $ebillStructure->logo_permission == 1 ? 'checked' : '' }}>
                                                            <span>Logo Image</span>
                                                        </label>
                                                        <div class="clearfix"></div>
                                                        <div class="col-xs-4 no-padding">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-offset-6 col-md-2">
                                                        <select class="form-control all-enteradd"
                                                            id="logo_priority_id" name="logo_priority"
                                                            placeholder="Select Priority">
                                                            @if ($ebillStructure->logo_priority > 0)
                                                                <option
                                                                    {{ $ebillStructure->logo_priority == 1 ? 'selected' : '' }}
                                                                    value="1">Left</option>
                                                                <option value="2"
                                                                    {{ $ebillStructure->logo_priority == 2 ? 'selected' : '' }}>
                                                                    Centre</option>
                                                                <option value="3"
                                                                    {{ $ebillStructure->logo_priority == 3 ? 'selected' : '' }}>
                                                                    Right</option>
                                                            @else
                                                                <option value="1">Left</option>
                                                                <option value="2" selected>Centre</option>
                                                                <option value="3">Right</option>
                                                            @endif
                                                        </select>
                                                        <span id="logo_priorityerror"></span>
                                                    </div>
                                                    <div class="clearfix"></div>

                                                </h4>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div id="collapseOne"
                                                class="logo_details_collapse panel-collapse collapse in">
                                                <div class="panel-body">
                                                    <div class="panel-ebill">
                                                        <div class="row">
                                                            <div class="col-md-5">
                                                                <div class="main-upload">
                                                                    <!-- //bb -->
                                                                    <h4 class="logo-set-permission">
                                                                        <label class="switch-feedback switch04 " />
                                                                        <input type="checkbox"
                                                                            name="custom_image_permission"
                                                                            id="logoimage_collapse_id"
                                                                            class="logoimagecl1 " value="1"
                                                                            {{ $ebillStructure->custom_image_permission == 1 ? 'checked' : '' }}>
                                                                        <div class="slider-table round-table"></div>
                                                                        </label>
                                                                        <span>custom image permission</span>
                                                                    </h4>
                                                                    <div id="collapseOne"
                                                                        class="logo_details_collapse logoimage_collapse panel-collapse collapse in">
                                                                        <div class="col-md-6 addratio-image">
                                                                            <select class="form-control all-enteradd"
                                                                                id="logo_image_size"
                                                                                name="logo_image_size"
                                                                                placeholder="Select Priority">
                                                                                <option
                                                                                    {{ $ebillStructure->logo_image_size == 1 ? 'selected' : '' }}
                                                                                    value="1">Logo ratio (4:3)
                                                                                </option>
                                                                                <option value="2"
                                                                                    {{ $ebillStructure->logo_image_size == 2 ? 'selected' : '' }}>
                                                                                    Logo ratio (5:2)</option>
                                                                            </select>
                                                                            <span id="banner_priorityerror"></span>
                                                                        </div>
                                                                        <div
                                                                            class="col-md-6 logoimgtype {{ $ebillStructure->logo_image_size == 1 ? 'none' : '' }}">
                                                                            <select class="form-control"
                                                                                id="logo_image_type"
                                                                                name="logo_image_type"
                                                                                placeholder="Select Priority">
                                                                                <option
                                                                                    {{ $ebillStructure->logo_image_type == 1 ? 'selected' : '' }}
                                                                                    value="1">Small</option>
                                                                                <option value="2"
                                                                                    {{ $ebillStructure->logo_image_type == 2 ? 'selected' : '' }}>
                                                                                    Large</option>
                                                                            </select>
                                                                            <span id="logo_type_error"></span>
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                        <div
                                                                            class="ratio43 {{ $ebillStructure->logo_image_size == 2 ? 'none' : '' }}">
                                                                            <div class="col-md-4 logo-img-ratioset">
                                                                                @if ($ebillStructure->logo_image != '')
                                                                                    <label class="newbtn newbtn01">
                                                                                        <img id="blah_add_banneradd_43"
                                                                                            src="{{ $ebillStructure->logo_image_size == 1 ? $ebillStructure->logo_image : asset('images/icon/Icons-01.png') }}">
                                                                                        <input id="logo_image_id_43"
                                                                                            class="all-enteradd"
                                                                                            type="file"
                                                                                            name="logo_image_43">
                                                                                        <input type="hidden"
                                                                                            value="{{ $ebillStructure->logo_image }}"
                                                                                            name="all_outlet_logo_image">
                                                                                        <p id="addpushimage_43"
                                                                                            class="logoimage newbtn2">
                                                                                            Add Image</p>
                                                                                    </label>
                                                                                @else
                                                                                    <label class="newbtn newbtn01">
                                                                                        <img id="blah_add_banneradd_43"
                                                                                            src="{{ asset('images/icon/Icons-01.png') }}">
                                                                                        <input id="logo_image_id_43"
                                                                                            type="file"
                                                                                            name="logo_image_43">
                                                                                        <p id="addpushimage_43"
                                                                                            class="newbtn2">Add Image*
                                                                                        </p>
                                                                                    </label>
                                                                                @endif
                                                                                <h4 class="clearimage"
                                                                                    style="display: none;">x</h4>
                                                                                <div class="clearfix"></div>
                                                                                <span class="category-error"
                                                                                    id="addbannererror_43"></span>
                                                                            </div>
                                                                            <div class="col-md-7">
                                                                                <div class="file-cont">
                                                                                    <p>Max size allowed: <span>50
                                                                                            KB</span></p>
                                                                                    <p>Accepted Format: <span>JPEG,
                                                                                            PNG</span></p>
                                                                                    <p>Image Ratio: <span
                                                                                            class="img_rto">4 :
                                                                                            3</span></p>
                                                                                    <p>Suggested Dimensions: <span
                                                                                            class="img_dmn">640x480</span>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                        <div
                                                                            class="ratio51 {{ $ebillStructure->logo_image_size == 1 ? 'none' : '' }}">
                                                                            <div class="col-md-4 logo-img-ratioset">
                                                                                @if ($ebillStructure->logo_image != '')
                                                                                    <label
                                                                                        class="newbtn newbtn01 blank">
                                                                                        <img id="blah_add_banneradd_51"
                                                                                            src="{{ $ebillStructure->logo_image_size == 2 ? $ebillStructure->logo_image : asset('images/icon/Icons-01.png') }}">
                                                                                        <input id="logo_image_id_51"
                                                                                            class="all-enteradd"
                                                                                            type="file"
                                                                                            name="logo_image_51">
                                                                                        <input type="hidden"
                                                                                            value="{{ $ebillStructure->logo_image }}"
                                                                                            name="all_outlet_logo_image">
                                                                                        <p id="addpushimage_51"
                                                                                            class="logoimage newbtn2">
                                                                                            Add Image</p>
                                                                                    </label>
                                                                                @else
                                                                                    <label
                                                                                        class="newbtn newbtn01 blank1">
                                                                                        <img id="blah_add_banneradd_51"
                                                                                            src="{{ asset('images/icon/Icons-01.png') }}">
                                                                                        <input id="logo_image_id_51"
                                                                                            type="file"
                                                                                            name="logo_image_51">
                                                                                        <p id="addpushimage_51"
                                                                                            class="newbtn2">Add Image*
                                                                                        </p>
                                                                                    </label>
                                                                                @endif
                                                                                <h4 class="clearimage"
                                                                                    style="display: none;">x</h4>
                                                                                <div class="clearfix"></div>
                                                                                <span class="category-error"
                                                                                    id="addbannererror_51"></span>
                                                                            </div>
                                                                            <div class="col-md-7">
                                                                                <div class="file-cont">
                                                                                    <p>Max size allowed: <span>50
                                                                                            KB</span></p>
                                                                                    <p>Accepted Format: <span>JPEG,
                                                                                            PNG</span></p>
                                                                                    <p>Image Ratio: <span
                                                                                            class="img_rto">5 :
                                                                                            2</span></p>
                                                                                    <p>Suggested Dimensions: <span
                                                                                            class="img_dmn">500X200</span>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                    </div>
                                                                    <div class="clearfix"></div>
                                                                    <!-- //bb -->
                                                                    <h4 class="logo-set-permission"><label
                                                                            class="switch-feedback switch04 " /><input
                                                                            type="checkbox"
                                                                            name="business_name_permission"
                                                                            id="business_name_permission_id"
                                                                            class="logoimagecl2" value="1"
                                                                            {{ $ebillStructure->business_name_permission == 0 && $ebillStructure->custom_image_permission == 0 ? 'checked' : ($ebillStructure->business_name_permission == 1 ? 'checked' : '') }}>
                                                                        <div class="slider-table round-table"></div>
                                                                        </label><span>Business Name permission</span>
                                                                    </h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="panel panel-default">
                                            <div class="panel-heading panel-heading-ebill" role="tab">
                                                <h4 class="panel-title">
                                                    <div class="col-xs-4 no-padding">
                                                        <label class="pure-material-checkbox">
                                                            <input type="hidden" name="id"
                                                                value="{{ $ebillStructure->id }}">
                                                            <input type="hidden" name="outletid"
                                                                value="{{ $outletid }}">
                                                            <input id="logo_permission_id" class="all-enteradd"
                                                                onclick="logo_permission_validation();"
                                                                type="checkbox" name="logo_permission" value="1"
                                                                {{ $ebillStructure->logo_permission == 1 ? 'checked' : '' }}>
                                                            <span>Logo Image</span>
                                                        </label>
                                                        <div class="clearfix"></div>
                                                        <div class="col-xs-4 no-padding">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-offset-6 col-md-2">
                                                        <select class="form-control all-enteradd"
                                                            id="logo_priority_id" name="logo_priority"
                                                            placeholder="Select Priority">
                                                            @if ($ebillStructure->logo_priority > 0)
                                                                <option
                                                                    {{ $ebillStructure->logo_priority == 1 ? 'selected' : '' }}
                                                                    value="1">Left</option>
                                                                <option value="2"
                                                                    {{ $ebillStructure->logo_priority == 2 ? 'selected' : '' }}>
                                                                    Centre</option>
                                                                <option value="3"
                                                                    {{ $ebillStructure->logo_priority == 3 ? 'selected' : '' }}>
                                                                    Right</option>
                                                            @else
                                                                <option value="1">Left</option>
                                                                <option value="2" selected>Centre</option>
                                                                <option value="3">Right</option>
                                                            @endif
                                                        </select>
                                                        <span id="logo_priorityerror"></span>
                                                    </div>
                                                    <div class="clearfix"></div>

                                                </h4>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div id="collapseOne"
                                                class="logo_details_collapse panel-collapse collapse in">
                                                <div class="panel-body">
                                                    <div class="panel-ebill">
                                                        <div class="row">
                                                            <input type="hidden" id="logo_image_size_v1"
                                                                name="logo_image_size">
                                                            <div class="col-md-5">
                                                                <div class="main-upload">
                                                                    <input type="hidden" value="0"
                                                                        name="business_name_permission">
                                                                    <input type="hidden" value="0"
                                                                        name="custom_image_permission">
                                                                    <div
                                                                        class="logo_details_collapse logoimage_collapse">
                                                                        <div class="ratio43">
                                                                            <div class="col-md-4">
                                                                                @if ($ebillStructure->logo_image != '')
                                                                                    <label class="newbtn newbtn01">
                                                                                        <img id="blah_add_banneradd_43"
                                                                                            src="{{ $ebillStructure->logo_image_size == 1 ? $ebillStructure->logo_image : asset('images/icon/Icons-01.png') }}">
                                                                                        <input id="logo_image_id_43"
                                                                                            class="all-enteradd"
                                                                                            type="file"
                                                                                            name="logo_image_43">
                                                                                        <input type="hidden"
                                                                                            value="{{ $ebillStructure->logo_image }}"
                                                                                            name="all_outlet_logo_image">
                                                                                        <p id="addpushimage_43"
                                                                                            class="logoimage newbtn2">
                                                                                            Add Image</p>
                                                                                    </label>
                                                                                @else
                                                                                    <label class="newbtn newbtn01">
                                                                                        <img id="blah_add_banneradd_43"
                                                                                            src="{{ asset('images/icon/Icons-01.png') }}">
                                                                                        <input id="logo_image_id_43"
                                                                                            type="file"
                                                                                            name="logo_image_43">
                                                                                        <p id="addpushimage_43"
                                                                                            class="newbtn2">Add Image*
                                                                                        </p>
                                                                                    </label>
                                                                                @endif
                                                                                <h4 class="clearimage"
                                                                                    style="display: none;">x</h4>
                                                                                <div class="clearfix"></div>
                                                                                <span class="category-error"
                                                                                    id="addbannererror_43"></span>
                                                                            </div>
                                                                            <div class="col-md-7">
                                                                                <div class="file-cont">
                                                                                    <p>Max size allowed: <span>50
                                                                                            KB</span></p>
                                                                                    <p>Accepted Format: <span>JPEG,
                                                                                            PNG</span></p>
                                                                                    <p>Image Ratio: <span
                                                                                            class="img_rto">4 :
                                                                                            3</span></p>
                                                                                    <p>Suggested Dimensions: <span
                                                                                            class="img_dmn">640x480</span>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="panel panel-default">
                                        <div class="panel-heading panel-heading-ebill" role="tab">
                                            <h4 class="panel-title">
                                                <div class="col-xs-4 no-padding">
                                                    <label class="pure-material-checkbox">
                                                        <input id="company_details_permission_id"
                                                            class="all-enteradd chk_priority" type="checkbox"
                                                            name="company_details_permission"
                                                            style="pointer-events:none;" disabled="disabled"
                                                            value="1"
                                                            {{ $ebillStructure->company_details_permission == 1 ? 'checked' : '' }}>
                                                        <span class="company-set">Company Details</span>
                                                    </label>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="col-md-3"><span id="sp_comp_dtls_error"></span></div>
                                                <div class="col-md-offset-3 col-md-2">
                                                    <!-- <input type="text" id="company_details_priority_id" class="form-control all-enteradd cl_priority" placeholder="Priority" name="company_details_priority" onkeypress="return isNumberKey(event);" maxlength="1" value="{{ $ebillStructure->company_details_priority }}">
                																		<span id="company_details_priorityerror"></span> -->
                                                </div>
                                                <div class="clearfix"></div>
                                            </h4>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div id="collapseOne"
                                            class="company_details_collapse panel-collapse collapse in">
                                            <div class="panel-body panel-body-company-details">
                                                <div class="panel-ebill">
                                                    <div class="row">
                                                        <div class="ebill-sub-panel">
                                                            <div class="col-md-3">
                                                                <div class="check-sec-part">
                                                                    <label class="pure-material-checkbox">
                                                                        <input id="company_name_permission_id"
                                                                            class="all-enteradd" type="checkbox"
                                                                            value="1"
                                                                            name="company_name_permission"
                                                                            {{ $ebillStructure->company_name_permission == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <div class="check-sec-part-input">

                                                                        <div class="ebill-sub-custom">

                                                                            <input type="text"
                                                                                class="form-control all-enteradd"
                                                                                placeholder="Enter Company Name Heading"
                                                                                name="company_name_heading"
                                                                                maxlength="50"
                                                                                value="{{ $ebillStructure->company_name_heading }}">
                                                                            <span class="category-error"
                                                                                id="company_name_headingerror"></span>
                                                                        </div>

                                                                        <div class="ebill-sub-custom">
                                                                            <input type="text"
                                                                                class="form-control all-enteradd"
                                                                                placeholder="Enter Company Name"
                                                                                name="company_name" maxlength="50"
                                                                                value="{{ $ebillStructure->company_name }}">
                                                                            <span class="category-error"
                                                                                id="company_nameerror"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9 no-padding">
                                                                <div class="col-md-6">
                                                                    <div class="col-md-10 no-padding-left">
                                                                        <div class="check-sec-part">
                                                                            <label class="pure-material-checkbox">
                                                                                <input
                                                                                    id="company_address1_permission_id"
                                                                                    type="checkbox"
                                                                                    name="company_address1_permission"
                                                                                    class="all-enteradd clcmpdtls"
                                                                                    value="1"
                                                                                    {{ $ebillStructure->company_address1_permission == 1 ? 'checked' : '' }}>
                                                                                <span></span>
                                                                            </label>
                                                                            <div class="check-sec-part-input">
                                                                                <div class="ebill-sub-custom">
                                                                                    <input type="text"
                                                                                        class="form-control all-enteradd"
                                                                                        placeholder="Enter Address Heading"
                                                                                        name="address_heading"
                                                                                        maxlength="50"
                                                                                        value="{{ $ebillStructure->address_heading }}">
                                                                                    <span class="category-error"
                                                                                        id="address_headingerror"></span>

                                                                                </div>
                                                                                <div class="ebill-sub-custom">
                                                                                    <input type="text"
                                                                                        class="form-control all-enteradd"
                                                                                        placeholder="Address Line 1"
                                                                                        name="company_address1"
                                                                                        maxlength="50"
                                                                                        value="{{ $ebillStructure->company_address1 }}">
                                                                                    <span class="category-error"
                                                                                        id="company_address1error"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2 ebill-set no-padding">
                                                                        <input type="text" placeholder="Priority"
                                                                            id="address1_priority_id"
                                                                            class="form-control all-enteradd"
                                                                            name="address1_priority"
                                                                            onkeypress="return isNumberKey(event);"
                                                                            maxlength="1"
                                                                            value="{{ $ebillStructure->address1_priority }}">
                                                                        <span id="address1_priorityerror"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="col-md-10 no-padding-left">
                                                                        <label class="pure-material-checkbox">
                                                                            <input id="company_address2_permission_id"
                                                                                class="all-enteradd clcmpdtls"
                                                                                type="checkbox"
                                                                                name="company_address2_permission"
                                                                                value="1"
                                                                                {{ $ebillStructure->company_address2_permission == 1 ? 'checked' : '' }}>
                                                                            <span></span>
                                                                        </label>
                                                                        <div class="ebill-sub-custom">
                                                                            <input type="text"
                                                                                class="form-control all-enteradd"
                                                                                placeholder="Address Line 2"
                                                                                name="company_address2" maxlength="50"
                                                                                value="{{ $ebillStructure->company_address2 }}">
                                                                            <span class="category-error"
                                                                                id="company_address2error"></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2 ebill-set no-padding">
                                                                        <input type="text" placeholder="Priority"
                                                                            id="address2_priority_id"
                                                                            class="form-control all-enteradd"
                                                                            name="address2_priority"
                                                                            onkeypress="return isNumberKey(event);"
                                                                            maxlength="1"
                                                                            value="{{ $ebillStructure->address2_priority }}">
                                                                        <span id="address2_priorityerror"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div class="ebill-sub-panel">
                                                            <div class="col-md-4">
                                                                <div class="col-md-10 no-padding-left">
                                                                    <label class="pure-material-checkbox">
                                                                        <input id="company_address3_permission_id"
                                                                            class="all-enteradd clcmpdtls"
                                                                            type="checkbox"
                                                                            name="company_address3_permission"
                                                                            value="1"
                                                                            {{ $ebillStructure->company_address3_permission == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <div class="ebill-sub-custom">
                                                                        <input type="text"
                                                                            class="form-control all-enteradd"
                                                                            placeholder="Address Line 3"
                                                                            name="company_address3" maxlength="50"
                                                                            value="{{ $ebillStructure->company_address3 }}">
                                                                        <span class="category-error"
                                                                            id="company_address3error"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 ebill-set no-padding">
                                                                    <input type="text" placeholder="Priority"
                                                                        id="address3_priority_id"
                                                                        class="form-control all-enteradd"
                                                                        name="address3_priority"
                                                                        onkeypress="return isNumberKey(event);"
                                                                        maxlength="1"
                                                                        value="{{ $ebillStructure->address3_priority }}">
                                                                    <span id="address3_priorityerror"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="col-md-10 no-padding-left">
                                                                    <div class="check-sec-part">
                                                                        <label class="pure-material-checkbox">
                                                                            <input id="gst_permission_id"
                                                                                class="all-enteradd clcmpdtls"
                                                                                type="checkbox" name="gst_permission"
                                                                                value="1"
                                                                                {{ $ebillStructure->gst_permission == 1 ? 'checked' : '' }}>
                                                                            <span></span>
                                                                        </label>
                                                                        <div class="check-sec-part-input">
                                                                            <div class="ebill-sub-custom">
                                                                                <input type="text"
                                                                                    class="form-control all-enteradd"
                                                                                    placeholder="Enter GSTIN Heading"
                                                                                    name="gstin_heading"
                                                                                    maxlength="50"
                                                                                    value="{{ $ebillStructure->gstin_heading }}">
                                                                                <span class="category-error"
                                                                                    id="gstin_headingerror"></span>

                                                                            </div>
                                                                            <div class="ebill-sub-custom">
                                                                                <input type="text"
                                                                                    class="form-control all-enteradd"
                                                                                    placeholder="GST Number"
                                                                                    name="gst_no" maxlength="50"
                                                                                    value="{{ $ebillStructure->gst_no }}">
                                                                                <span class="category-error"
                                                                                    id="gst_noerror"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 ebill-set no-padding">
                                                                    <input type="text" placeholder="Priority"
                                                                        id="gst_priority_id"
                                                                        class="form-control all-enteradd"
                                                                        name="gst_priority"
                                                                        onkeypress="return isNumberKey(event);"
                                                                        maxlength="1"
                                                                        value="{{ $ebillStructure->gst_priority }}">
                                                                    <span id="gst_priorityerror"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="col-md-10 no-padding-left">
                                                                    <label class="pure-material-checkbox">
                                                                        <input id="company_number_permission_id"
                                                                            type="checkbox"
                                                                            name="company_number_permission"
                                                                            class="all-enteradd clcmpdtls"
                                                                            value="1"
                                                                            {{ $ebillStructure->company_number_permission == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <div class="ebill-sub-custom">
                                                                        <input type="text"
                                                                            class="form-control all-enteradd"
                                                                            placeholder="Enter Phone No Heading"
                                                                            name="phone_no_heading" maxlength="50"
                                                                            value="{{ $ebillStructure->phone_no_heading }}">
                                                                        <span class="category-error"
                                                                            id="phone_no_headingerror"></span>

                                                                    </div>
                                                                    <div
                                                                        class="ebill-sub-custom ebill-mob-custom country_set_custom">
                                                                        <input type="hidden"
                                                                            name="company_country_code"
                                                                            id="company_country_code" pattern="[0-9]+"
                                                                            value="{{ $ebillStructure->company_countrycode }}">
                                                                        <div id="mobile-container"
                                                                            class="mobile-container-set">
                                                                            <input type="text"
                                                                                class="form-control all-enteradd company_number1"
                                                                                id="company_number"
                                                                                placeholder="Company Contact Number"
                                                                                name="company_number" data-id="1"
                                                                                onkeypress="return isNumberKey(event);"
                                                                                value="{{ $ebillStructure->company_number }}"
                                                                                maxlength="10">

                                                                            @if (!empty($ebillStructure->company_number1))
																																						@php
																																						$company_number1 = explode(' ', $ebillStructure->company_number1);
																																						@endphp
																																						<input type="hidden"
                                                                            name="company_country_code1"
                                                                            id="company_country_code1" pattern="[0-9]+"
                                                                            value="{{ $company_number1[1] }}">
                                                                        
                                                                                <div class="mobile-set"
                                                                                    id="work_mobile_head2">
                                                                                    <div class="col-md-10 no-padding">
                                                                                        <input type="text"
                                                                                            class="form-control all-enteradd company_number"
                                                                                            id="company_number2"
                                                                                            data-id="2"
                                                                                            placeholder="Company Contact Number"
                                                                                            name="company_number1"
                                                                                            onkeypress="return isNumberKey(event);"
                                                                                            value="{{ $company_number1[1] }}"
                                                                                            autocomplete="off"
                                                                                            style="padding-left: 78px;"
                                                                                            required maxlength="10">
                                                                                        <span class="category-error"
                                                                                            id="company_numbererror2"></span>
                                                                                    </div>
                                                                                    <div
                                                                                        class="col-md-2 no-padding-right">
                                                                                        <div
                                                                                            class="remove-mobile-rule">
                                                                                            <a class="mobile-add-set"
                                                                                                href="javascript:void(0)"
                                                                                                id="1"><i>[-]</i></a>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="clearfix"></div>
                                                                                </div>
                                                                            @endif

                                                                            @if (!empty($ebillStructure->company_number2))
																																						@php
																																						$company_number2 = explode(' ', $ebillStructure->company_number2);
																																						@endphp
																																						<input type="hidden"
                                                                            name="company_country_code2"
                                                                            id="company_country_code2" pattern="[0-9]+"
                                                                            value="{{ $company_number2[1] }}">
                                                                        
                                                                            
                                                                                <div class="mobile-set"
                                                                                    id="work_mobile_head3">
                                                                                    <div class="col-md-10 no-padding">
                                                                                        <input type="text"
                                                                                            class="form-control all-enteradd company_number"
                                                                                            id="company_number3"
                                                                                            data-id="3"
                                                                                            placeholder="Company Contact Number"
                                                                                            name="company_number2"
                                                                                            onkeypress="return isNumberKey(event);"
                                                                                            value="{{ $company_number2[1] }}"
                                                                                            autocomplete="off"
                                                                                            style="padding-left: 78px;"
                                                                                            required maxlength="10">
                                                                                        <span class="category-error"
                                                                                            id="company_numbererror3"></span>
                                                                                    </div>
                                                                                    <div
                                                                                        class="col-md-2 no-padding-right">
                                                                                        <div
                                                                                            class="remove-mobile-rule">
                                                                                            <a class="mobile-add-set"
                                                                                                href="javascript:void(0)"
                                                                                                id="2"><i>[-]</i></a>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="clearfix"></div>
                                                                                </div>
                                                                            @endif



                                                                        </div>
                                                                        <a href="javascript:void(0)"
                                                                            id="add_mobile"><i>[+] Add New</i></a>



                                                                        <span class="category-error"
                                                                            id="company_numbererror"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 ebill-set no-padding">
                                                                    <input type="text" placeholder="Priority"
                                                                        id="company_number_priority_id"
                                                                        class="form-control all-enteradd"
                                                                        name="company_number_priority"
                                                                        onkeypress="return isNumberKey(event);"
                                                                        maxlength="1"
                                                                        value="{{ $ebillStructure->company_number_priority }}">
                                                                    <span id="company_number_priorityerror"></span>
                                                                </div>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div class="ebill-sub-panel">
                                                            <div class="col-md-4">
                                                                <div class="col-md-10 no-padding-left">
                                                                    <div class="check-sec-part">
                                                                        <label class="pure-material-checkbox">
                                                                            <input id="legal_name_permission_id"
                                                                                class="all-enteradd clcmpdtls"
                                                                                type="checkbox"
                                                                                name="legal_name_permission"
                                                                                value="1"
                                                                                {{ $ebillStructure->legal_name_permission == 1 ? 'checked' : '' }}>
                                                                            <span></span>
                                                                        </label>
                                                                        <div class="check-sec-part-input">
                                                                            <div class="ebill-sub-custom">
                                                                                <input type="text"
                                                                                    class="form-control all-enteradd"
                                                                                    placeholder="Enter Legal Name Heading"
                                                                                    name="legal_name_heading"
                                                                                    maxlength="50"
                                                                                    value="{{ $ebillStructure->legal_name_heading }}">
                                                                                <span class="category-error"
                                                                                    id="legal_name_headingerror"></span>

                                                                            </div>
                                                                            <div class="ebill-sub-custom">
                                                                                <input type="text"
                                                                                    class="form-control all-enteradd"
                                                                                    placeholder="Legal Name"
                                                                                    name="legal_name" maxlength="50"
                                                                                    value="{{ $ebillStructure->legal_name }}">
                                                                                <span class="category-error"
                                                                                    id="legal_nameerror"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 ebill-set no-padding">
                                                                    <input type="text" placeholder="Priority"
                                                                        id="legal_name_priority_id"
                                                                        class="form-control all-enteradd"
                                                                        name="legal_name_priority"
                                                                        onkeypress="return isNumberKey(event);"
                                                                        maxlength="1"
                                                                        value="{{ $ebillStructure->legal_name_priority }}">
                                                                    <span id="legal_name_priorityerror"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="col-md-10 no-padding-left">
                                                                    <label class="pure-material-checkbox">
                                                                        <input id="outlet_location_permission_id"
                                                                            class="all-enteradd clcmpdtls"
                                                                            type="checkbox"
                                                                            name="outlet_location_permission"
                                                                            value="1"
                                                                            {{ $ebillStructure->outlet_location_permission == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <div class="ebill-sub-custom">
                                                                        <input type="text"
                                                                            class="form-control all-enteradd"
                                                                            placeholder="Outlet Location"
                                                                            name="outlet_location" maxlength="50"
                                                                            value="{{ $ebillStructure->outlet_location }}">
                                                                        <span class="category-error"
                                                                            id="outlet_locationerror"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>

                                                        <span class="category-error"
                                                            id="panel-body-company-details-permissionerror"></span>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-default">
                                        <div class="panel-heading panel-heading-ebill" role="tab">
                                            <h4 class="panel-title">
                                                <div class="col-xs-4 no-padding">
                                                    <label class="pure-material-checkbox">
                                                        <input id="company_details_permission_id"
                                                            class="all-enteradd chk_priority" type="checkbox"
                                                            name="company_details_permission"
                                                            style="pointer-events:none;" disabled="disabled"
                                                            value="1"
                                                            {{ $ebillStructure->company_details_permission == 1 ? 'checked' : '' }}>
                                                        <span class="company-set">Company Header Details</span>
                                                    </label>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="col-md-3"><span id="sp_comp_dtls_error"></span></div>
                                                <div class="col-md-offset-3 col-md-2">
                                                    <!-- <input type="text" id="company_details_priority_id" class="form-control all-enteradd cl_priority" placeholder="Priority" name="company_details_priority" onkeypress="return isNumberKey(event);" maxlength="1" value="{{ $ebillStructure->company_details_priority }}">
             <span id="company_details_priorityerror"></span> -->
                                                </div>
                                                <div class="clearfix"></div>
                                            </h4>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div id="collapseOne"
                                            class="company_details_collapse panel-collapse collapse in">
                                            <div class="panel-body panel-body-company-details">
                                                <div class="panel-ebill">
                                                    <div class="row">
                                                        <div class="ebill-sub-panel">
                                                            <div class="col-md-4">
                                                                <input type="text"
                                                                    class="form-control all-enteradd"
                                                                    placeholder="Enter Company Name Heading"
                                                                    name="company_name_heading" maxlength="50"
                                                                    value="{{ $ebillStructure->company_name_heading }}">
                                                                <span class="category-error"
                                                                    id="company_name_headingerror"></span>

                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="text"
                                                                    class="form-control all-enteradd"
                                                                    placeholder="Enter Address Heading"
                                                                    name="address_heading" maxlength="50"
                                                                    value="{{ $ebillStructure->address_heading }}">
                                                                <span class="category-error"
                                                                    id="address_headingerror"></span>

                                                            </div>

                                                            <div class="col-md-4">
                                                                <input type="text"
                                                                    class="form-control all-enteradd"
                                                                    placeholder="Enter GSTIN Heading"
                                                                    name="gstin_heading" maxlength="50"
                                                                    value="{{ $ebillStructure->gstin_heading }}">
                                                                <span class="category-error"
                                                                    id="gstin_headingerror"></span>

                                                            </div>

                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div class="ebill-sub-panel">
                                                            <div class="col-md-4">
                                                                <input type="text"
                                                                    class="form-control all-enteradd"
                                                                    placeholder="Enter Phone No Heading"
                                                                    name="phone_no_heading" maxlength="50"
                                                                    value="{{ $ebillStructure->phone_no_heading }}">
                                                                <span class="category-error"
                                                                    id="phone_no_headingerror"></span>

                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="text"
                                                                    class="form-control all-enteradd"
                                                                    placeholder="Enter Legal Name Heading"
                                                                    name="legal_name_heading" maxlength="50"
                                                                    value="{{ $ebillStructure->legal_name_heading }}">
                                                                <span class="category-error"
                                                                    id="legal_name_headingerror"></span>

                                                            </div>

                                                            <div class="col-md-4">
                                                            </div>

                                                            <div class="clearfix"></div>
                                                        </div>

                                                        <span class="category-error"
                                                            id="panel-body-company-details-permissionerror"></span>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-default">
                                        <div class="panel-heading panel-heading-ebill" role="tab">
                                            <h4 class="panel-title">
                                                <div class="col-xs-4 no-padding">
                                                    <label class="pure-material-checkbox">
                                                        <input id="bill_details_permission_id" type="checkbox"
                                                            name="bill_details_permission"
                                                            class="all-enteradd chk_priority" value="1"
                                                            {{ $ebillStructure->bill_details_permission == 1 ? 'checked' : '' }}>
                                                        <span>Bill Details</span>
                                                    </label>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="col-md-offset-6 col-md-2">
                                                    <input type="text" id="bill_details_priority_id"
                                                        class="form-control all-enteradd cl_priority"
                                                        placeholder="Priority" name="bill_details_priority"
                                                        onkeypress="return isNumberKey(event);" maxlength="2"
                                                        value="{{ $ebillStructure->bill_details_priority }}">
                                                    <span id="bill_details_priorityerror"></span>
                                                </div>
                                                <div class="clearfix"></div>
                                            </h4>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div id="collapseOne"
                                            class="bill_details_collapse panel-collapse collapse in">
                                            <div class="panel-body panel-body-bill-details">
                                                <div class="panel-ebill">
                                                    <div class="row">
                                                        <div class="ebill-sub-panel">
                                                            <div class="col-md-4">
                                                                <div class="col-md-10 no-padding-left">
                                                                    <label class="pure-material-checkbox">
                                                                        <input id="transactionid_permission_id"
                                                                            class="all-enteradd" type="checkbox"
                                                                            name="transactionid_permission"
                                                                            value="1"
                                                                            {{ $ebillStructure->transactionid_permission == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <div class="ebill-sub-custom">
                                                                        <input type="text"
                                                                            class="form-control all-enteradd"
                                                                            placeholder="Transaction ID"
                                                                            name="transactionid_name" maxlength="50"
                                                                            value="{{ $ebillStructure->transactionid_name }}">
                                                                        <span class="category-error p-error1"
                                                                            id="transactionid_name_error"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 ebill-set no-padding">
                                                                    <input type="text" placeholder="Priority"
                                                                        id="transactionid_priority_id"
                                                                        class="form-control all-enteradd"
                                                                        name="transactionid_priority"
                                                                        onkeypress="return isNumberKey(event);"
                                                                        maxlength="2"
                                                                        value="{{ $ebillStructure->transactionid_priority }}">
                                                                    <span id="transactionid_priorityerror"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="col-md-10 no-padding-left">
                                                                    <label class="pure-material-checkbox">
                                                                        <input id="bill_number_permission_id"
                                                                            class="all-enteradd" type="checkbox"
                                                                            name="bill_number_permission"
                                                                            value="1"
                                                                            {{ $ebillStructure->bill_number_permission == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <div class="ebill-sub-custom">
                                                                        <input type="text"
                                                                            class="form-control all-enteradd"
                                                                            placeholder="Bill Number"
                                                                            name="bill_number_name" maxlength="50"
                                                                            value="{{ $ebillStructure->bill_number_name }}">
                                                                        <span class="category-error p-error1"
                                                                            id="bill_number__error"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 ebill-set no-padding">
                                                                    <input type="text" placeholder="Priority"
                                                                        id="bill_number_priority_id"
                                                                        class="form-control all-enteradd"
                                                                        name="bill_number_priority"
                                                                        onkeypress="return isNumberKey(event);"
                                                                        maxlength="2"
                                                                        value="{{ $ebillStructure->bill_number_priority }}">
                                                                    <span id="bill_number_priorityerror"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="col-md-10 no-padding-left">
                                                                    <label class="pure-material-checkbox">
                                                                        <input id="bill_date_permission_id"
                                                                            class="all-enteradd" type="checkbox"
                                                                            name="bill_date_permission"
                                                                            value="1"
                                                                            {{ $ebillStructure->bill_date_permission == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <div class="ebill-sub-custom">
                                                                        <input type="text"
                                                                            class="form-control all-enteradd"
                                                                            placeholder="Bill Date"
                                                                            name="bill_date_name" maxlength="50"
                                                                            value="{{ $ebillStructure->bill_date_name }}">
                                                                        <span
                                                                            class="category-error p-error1 p-sub-error"
                                                                            id="bill_date_name_error"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 ebill-set no-padding">
                                                                    <input type="text" placeholder="Priority"
                                                                        id="bill_date_priority_id"
                                                                        class="form-control all-enteradd"
                                                                        name="bill_date_priority"
                                                                        onkeypress="return isNumberKey(event);"
                                                                        maxlength="2"
                                                                        value="{{ $ebillStructure->bill_date_priority }}">
                                                                    <span id="bill_date_priorityerror"></span>
                                                                </div>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>

                                                        <div class="ebill-sub-panel">
                                                            <div class="col-md-4">
                                                                <div class="col-md-10 no-padding-left">
                                                                    <label class="pure-material-checkbox">
                                                                        <input id="bill_time_permission_id"
                                                                            class="all-enteradd" type="checkbox"
                                                                            name="bill_time_permission"
                                                                            value="1"
                                                                            {{ $ebillStructure->bill_time_permission == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <div class="ebill-sub-custom">
                                                                        <input type="text"
                                                                            class="form-control all-enteradd"
                                                                            placeholder="Bill Time"
                                                                            name="bill_time_name" maxlength="50"
                                                                            value="{{ $ebillStructure->bill_time_name }}">
                                                                        <span class="category-error p-error1"
                                                                            id="bill_time_name_error"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 ebill-set no-padding">
                                                                    <input type="text" placeholder="Priority"
                                                                        id="bill_time_priority_id"
                                                                        class="form-control all-enteradd"
                                                                        name="bill_time_priority"
                                                                        onkeypress="return isNumberKey(event);"
                                                                        maxlength="2"
                                                                        value="{{ $ebillStructure->bill_time_priority }}">
                                                                    <span id="bill_time_priorityerror"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="col-md-10 no-padding-left">
                                                                    <label class="pure-material-checkbox">
                                                                        <input id="section_permission_id"
                                                                            type="checkbox"
                                                                            name="section_permission"
                                                                            class="all-enteradd"
                                                                            onclick="section_permission_validation();"
                                                                            value="1"
                                                                            {{ $ebillStructure->section_permission == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <div class="ebill-sub-custom">
                                                                        <input type="text"
                                                                            class="form-control all-enteradd"
                                                                            placeholder="Section"
                                                                            name="section_name" maxlength="50"
                                                                            value="{{ $ebillStructure->section_name }}">
                                                                        <span class="category-error p-error1"
                                                                            id="section_name_error"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 ebill-set no-padding">
                                                                    <input type="text" placeholder="Priority"
                                                                        id="section_priority_id"
                                                                        class="form-control all-enteradd"
                                                                        name="section_priority"
                                                                        onkeypress="return isNumberKey(event);"
                                                                        maxlength="2"
                                                                        value="{{ $ebillStructure->section_priority }}">
                                                                    <span id="section_priorityerror"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="col-md-10 no-padding-left">
                                                                    <label class="pure-material-checkbox">
                                                                        <input id="table_permission_id"
                                                                            type="checkbox" name="table_permission"
                                                                            class="all-enteradd"
                                                                            onclick="table_permission_validation();"
                                                                            value="1"
                                                                            {{ $ebillStructure->table_permission == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <div class="ebill-sub-custom">
                                                                        <input type="text"
                                                                            class="form-control all-enteradd"
                                                                            placeholder="Table" name="table_name"
                                                                            maxlength="50"
                                                                            value="{{ $ebillStructure->table_name }}">
                                                                        <span
                                                                            class="category-error p-error1 p-sub-error"
                                                                            id="table_name_error"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 ebill-set no-padding">
                                                                    <input type="text" placeholder="Priority"
                                                                        id="table_priority_id"
                                                                        class="form-control all-enteradd"
                                                                        name="table_priority"
                                                                        onkeypress="return isNumberKey(event);"
                                                                        maxlength="2"
                                                                        value="{{ $ebillStructure->table_priority }}">
                                                                    <span id="table_priorityerror"></span>
                                                                </div>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>

                                                        <div class="ebill-sub-panel">
                                                            <div class="col-md-4">
                                                                <div class="col-md-10 no-padding-left">
                                                                    <label class="pure-material-checkbox">
                                                                        <input id="server_permission_id"
                                                                            class="all-enteradd" type="checkbox"
                                                                            name="server_permission"
                                                                            onclick="server_permission_validation();"
                                                                            value="1"
                                                                            {{ $ebillStructure->server_permission == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <div class="ebill-sub-custom">
                                                                        <input type="text"
                                                                            class="form-control all-enteradd"
                                                                            placeholder="Server" name="server_name"
                                                                            maxlength="50"
                                                                            value="{{ $ebillStructure->server_name }}">
                                                                        <span class="category-error p-error1"
                                                                            id="server_name_error"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 ebill-set no-padding">
                                                                    <input type="text" placeholder="Priority"
                                                                        id="server_priority_id"
                                                                        class="form-control all-enteradd"
                                                                        name="server_priority"
                                                                        onkeypress="return isNumberKey(event);"
                                                                        maxlength="2"
                                                                        value="{{ $ebillStructure->server_priority }}">
                                                                    <span id="server_priorityerror"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="col-md-10 no-padding-left">
                                                                    <label class="pure-material-checkbox">
                                                                        <input id="service_permission_id"
                                                                            class="all-enteradd" type="checkbox"
                                                                            name="service_permission"
                                                                            onclick="service_permission_validation();"
                                                                            value="1"
                                                                            {{ $ebillStructure->service_permission == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <div class="ebill-sub-custom">
                                                                        <input type="text"
                                                                            class="form-control all-enteradd"
                                                                            placeholder="Service"
                                                                            name="service_name" maxlength="50"
                                                                            value="{{ $ebillStructure->service_name }}">
                                                                        <span class="category-error p-error1"
                                                                            id="service_name_error"></span>

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 ebill-set no-padding">
                                                                    <input type="text" placeholder="Priority"
                                                                        id="service_priority_id"
                                                                        class="form-control all-enteradd"
                                                                        name="service_priority"
                                                                        onkeypress="return isNumberKey(event);"
                                                                        maxlength="2"
                                                                        value="{{ $ebillStructure->service_priority }}">
                                                                    <span id="service_priorityerror"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="col-md-10 no-padding-left">
                                                                    <label class="pure-material-checkbox">
                                                                        <input id="channel_permission_id"
                                                                            class="all-enteradd" type="checkbox"
                                                                            name="channel_permission"
                                                                            onclick="channel_permission_validation();"
                                                                            value="1"
                                                                            {{ $ebillStructure->channel_permission == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <div class="ebill-sub-custom">
                                                                        <input type="text"
                                                                            class="form-control all-enteradd"
                                                                            placeholder="Channel"
                                                                            name="channel_name" maxlength="50"
                                                                            value="{{ $ebillStructure->channel_name }}">
                                                                        <span
                                                                            class="category-error p-error1 p-sub-error"
                                                                            id="channel_name_error"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 ebill-set no-padding">
                                                                    <input type="text" placeholder="Priority"
                                                                        id="channel_priority_id"
                                                                        class="form-control all-enteradd"
                                                                        name="channel_priority"
                                                                        onkeypress="return isNumberKey(event);"
                                                                        maxlength="2"
                                                                        value="{{ $ebillStructure->channel_priority }}">
                                                                    <span id="channel_priorityerror"></span>
                                                                </div>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>

                                                        <div class="ebill-sub-panel">


                                                            <div class="col-md-4">
                                                                <div class="col-md-10 no-padding-left">
                                                                    <label class="pure-material-checkbox">
                                                                        <input id="payment_mode_permission_id"
                                                                            type="checkbox"
                                                                            name="payment_mode_permission"
                                                                            class="all-enteradd" value="1"
                                                                            {{ $ebillStructure->payment_mode_permission == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <div class="ebill-sub-custom">
                                                                        <input type="text"
                                                                            class="form-control all-enteradd"
                                                                            placeholder="Payment Mode"
                                                                            name="payment_mode_name" maxlength="50"
                                                                            value="{{ $ebillStructure->payment_mode_name }}">
                                                                        <span
                                                                            class="category-error p-sub-error p-error1"
                                                                            id="payment_mode_name_error"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 ebill-set no-padding">
                                                                    <input type="text" placeholder="Priority"
                                                                        id="payment_mode_priority_id"
                                                                        class="form-control all-enteradd"
                                                                        name="payment_mode_priority"
                                                                        onkeypress="return isNumberKey(event);"
                                                                        maxlength="2"
                                                                        value="{{ $ebillStructure->payment_mode_priority }}">
                                                                    <span id="payment_mode_priorityerror"></span>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="col-md-10 no-padding-left">
                                                                    <label class="pure-material-checkbox">
                                                                        <input id="customer_gstin_permission_id"
                                                                            type="checkbox"
                                                                            name="customer_gstin_permission"
                                                                            value="1"
                                                                            {{ $ebillStructure->customer_gstin_permission == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <div class="ebill-sub-custom">
                                                                        <input type="text"
                                                                            class="form-control all-enteradd"
                                                                            placeholder="GSTIN"
                                                                            name="customer_gstin_name"
                                                                            maxlength="50"
                                                                            value="{{ $ebillStructure->customer_gstin_name }}">
                                                                        <span class="category-error p-error1"
                                                                            id="customer_gstin_name_error"></span>

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 ebill-set no-padding">
                                                                    <input type="text" placeholder="Priority"
                                                                        id="customer_gstin_priority_id"
                                                                        class="form-control all-enteradd"
                                                                        name="customer_gstin_priority"
                                                                        onkeypress="return isNumberKey(event);"
                                                                        maxlength="2"
                                                                        value="{{ $ebillStructure->customer_gstin_priority }}">
                                                                    <span id="customer_gstin_priorityerror"></span>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="col-md-10 no-padding-left">
                                                                    <label class="pure-material-checkbox">
                                                                        <input id="customer_storename_permission_id"
                                                                            type="checkbox" class="all-enteradd"
                                                                            name="customer_storename_permission"
                                                                            value="1"
                                                                            {{ $ebillStructure->customer_storename_permission == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <div class="ebill-sub-custom">
                                                                        <input type="text"
                                                                            class="form-control all-enteradd"
                                                                            placeholder="Store Name"
                                                                            name="customer_store_name"
                                                                            maxlength="30"
                                                                            value="{{ $ebillStructure->customer_store_name }}">
                                                                        <span class="category-error p-error1"
                                                                            id="customer_store_name_error"></span>

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 ebill-set no-padding">
                                                                    <input type="text" placeholder="Priority"
                                                                        id="customer_storename_priority_id"
                                                                        class="form-control all-enteradd"
                                                                        name="customer_storename_priority"
                                                                        onkeypress="return isNumberKey(event);"
                                                                        maxlength="2"
                                                                        value="{{ $ebillStructure->customer_storename_priority }}">
                                                                    <span
                                                                        id="customer_storename_priorityerror"></span>
                                                                </div>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading panel-heading-ebill" role="tab">
                                            <h4 class="panel-title">
                                                <div class="col-xs-4 no-padding">
                                                    <label class="pure-material-checkbox">
                                                        <input id="delivery_address_details_permission_id"
                                                            class="all-enteradd chk_priority" type="checkbox"
                                                            value="1"
                                                            name="delivery_address_details_permission"
                                                            {{ $ebillStructure->delivery_address_details_permission == 1 ? 'checked' : '' }}>
                                                        <span>Profile and Delivery Details</span>
                                                    </label>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="col-md-offset-6 col-md-2">
                                                    <input type="text" id="delivery_address_details_priority_id"
                                                        class="form-control all-enteradd cl_priority"
                                                        placeholder="Priority"
                                                        name="delivery_address_details_priority"
                                                        onkeypress="return isNumberKey(event);" maxlength="2"
                                                        value="{{ $ebillStructure->delivery_address_details_priority }}">
                                                    <span id="delivery_address_details_priorityerror"></span>
                                                </div>
                                                <div class="clearfix"></div>
                                            </h4>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div id="collapseOne"
                                            class="delivery_address_collapse panel-collapse collapse in">
                                            <div class="panel-body panel-body-delivery-address-details">
                                                <div class="panel-ebill">
                                                    <div class="row">
                                                        <div class="ebill-sub-panel">
                                                            <div class="col-md-4">
                                                                <div class="col-md-10 no-padding-left">
                                                                    <label class="pure-material-checkbox">
                                                                        <input id="customer_name_permission_id"
                                                                            type="checkbox"
                                                                            name="customer_name_permission"
                                                                            class="all-enteradd" value="1"
                                                                            {{ $ebillStructure->customer_name_permission == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <div class="ebill-sub-custom">
                                                                        <input type="text"
                                                                            class="form-control all-enteradd"
                                                                            placeholder="Customer Name"
                                                                            name="customer_name_name" maxlength="50"
                                                                            value="{{ $ebillStructure->customer_name_name }}">
                                                                        <span class="category-error p-error1"
                                                                            id="customer_name_name_error"></span>

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 ebill-set no-padding">
                                                                    <input type="text" placeholder="Priority"
                                                                        id="customer_name_priority_id"
                                                                        class="form-control all-enteradd"
                                                                        name="customer_name_priority"
                                                                        onkeypress="return isNumberKey(event);"
                                                                        maxlength="2"
                                                                        value="{{ $ebillStructure->customer_name_priority }}">
                                                                    <span id="customer_name_priorityerror"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="col-md-10 no-padding-left">
                                                                    <label class="pure-material-checkbox">
                                                                        <input id="customer_number_permission_id"
                                                                            type="checkbox"
                                                                            name="customer_number_permission"
                                                                            class="all-enteradd" value="1"
                                                                            {{ $ebillStructure->customer_number_permission == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <div class="ebill-sub-custom">
                                                                        <input type="text"
                                                                            class="form-control all-enteradd"
                                                                            placeholder="Mobile Number"
                                                                            name="customer_number_name"
                                                                            maxlength="50"
                                                                            value="{{ $ebillStructure->customer_number_name }}">
                                                                        <span class="category-error p-error1"
                                                                            id="customer_number_name_error"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 ebill-set no-padding">
                                                                    <input type="text" placeholder="Priority"
                                                                        id="customer_number_priority_id"
                                                                        class="form-control all-enteradd"
                                                                        name="customer_number_priority"
                                                                        onkeypress="return isNumberKey(event);"
                                                                        maxlength="2"
                                                                        value="{{ $ebillStructure->customer_number_priority }}">
                                                                    <span id="customer_number_priorityerror"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="col-md-10 no-padding-left">
                                                                    <label class="pure-material-checkbox">
                                                                        <input id="delivery_address_permission_id"
                                                                            type="checkbox"
                                                                            name="delivery_address_permission"
                                                                            class="all-enteradd" value="1"
                                                                            {{ $ebillStructure->delivery_address_permission == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <div class="ebill-sub-custom">
                                                                        <input type="text"
                                                                            class="form-control all-enteradd"
                                                                            placeholder="Delivery Address"
                                                                            name="delivery_address" maxlength="30"
                                                                            value="{{ $ebillStructure->delivery_address }}">
                                                                        <span
                                                                            class="category-error p-error1 p-sub-error"
                                                                            id="delivery_address_error"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 ebill-set no-padding">
                                                                    <input type="text" placeholder="Priority"
                                                                        id="delivery_address_priority_id"
                                                                        class="form-control all-enteradd"
                                                                        name="delivery_address_priority"
                                                                        onkeypress="return isNumberKey(event);"
                                                                        maxlength="1"
                                                                        value="{{ $ebillStructure->delivery_address_priority }}">
                                                                    <span id="delivery_address_priorityerror"></span>
                                                                </div>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div class="ebill-sub-panel">
                                                            <div class="col-md-4">
                                                                <div class="col-md-10 no-padding-left">
                                                                    <label class="pure-material-checkbox">
                                                                        <input id="city_permission_id"
                                                                            type="checkbox" name="city_permission"
                                                                            class="all-enteradd" value="1"
                                                                            {{ $ebillStructure->city_permission == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <div class="ebill-sub-custom">
                                                                        <input type="text"
                                                                            class="form-control all-enteradd"
                                                                            placeholder="City" name="city"
                                                                            maxlength="15"
                                                                            value="{{ $ebillStructure->city }}">
                                                                        <span
                                                                            class="category-error p-error1 p-sub-error"
                                                                            id="city_error"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 ebill-set no-padding">
                                                                    <input type="text" placeholder="Priority"
                                                                        id="city_priority_id"
                                                                        class="form-control all-enteradd"
                                                                        name="city_priority"
                                                                        onkeypress="return isNumberKey(event);"
                                                                        maxlength="1"
                                                                        value="{{ $ebillStructure->city_priority }}">
                                                                    <span id="city_priorityerror"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="col-md-10 no-padding-left">
                                                                    <label class="pure-material-checkbox">
                                                                        <input id="pincode_permission_id"
                                                                            class="all-enteradd" type="checkbox"
                                                                            name="pincode_permission" value="1"
                                                                            {{ $ebillStructure->pincode_permission == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <div class="ebill-sub-custom">
                                                                        <input type="text"
                                                                            class="form-control all-enteradd"
                                                                            placeholder="Pincode" name="pincode"
                                                                            maxlength="15"
                                                                            value="{{ $ebillStructure->pincode }}">
                                                                        <span
                                                                            class="category-error p-error1 p-sub-error"
                                                                            id="pincode_error"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 ebill-set no-padding">
                                                                    <input type="text" placeholder="Priority"
                                                                        id="pincode_priority_id"
                                                                        class="form-control all-enteradd"
                                                                        name="pincode_priority"
                                                                        onkeypress="return isNumberKey(event);"
                                                                        maxlength="1"
                                                                        value="{{ $ebillStructure->pincode_priority }}">
                                                                    <span id="pincode_priorityerror"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="col-md-10 no-padding-left">
                                                                    <label class="pure-material-checkbox">
                                                                        <input id="landmark_permission_id"
                                                                            type="checkbox"
                                                                            name="landmark_permission"
                                                                            value="1" class="all-enteradd"
                                                                            {{ $ebillStructure->landmark_permission == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <div class="ebill-sub-custom">
                                                                        <input type="text"
                                                                            class="form-control all-enteradd"
                                                                            placeholder="Landmark" name="landmark"
                                                                            maxlength="30"
                                                                            value="{{ $ebillStructure->landmark }}">
                                                                        <span
                                                                            class="category-error p-error1 p-sub-error"
                                                                            id="landmarkerror"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 ebill-set no-padding">
                                                                    <input type="text" placeholder="Priority"
                                                                        id="landmark_priority_id"
                                                                        class="form-control all-enteradd"
                                                                        name="landmark_priority"
                                                                        onkeypress="return isNumberKey(event);"
                                                                        maxlength="1"
                                                                        value="{{ $ebillStructure->landmark_priority }}">
                                                                    <span id="landmark_priorityerror"></span>
                                                                </div>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div class="ebill-sub-panel">
                                                            <div class="col-md-4">
                                                                <div class="col-md-10 no-padding-left">
                                                                    <label class="pure-material-checkbox">
                                                                        <input id="customer_pan_permission_id"
                                                                            class="all-enteradd" type="checkbox"
                                                                            name="customer_pan_permission"
                                                                            value="1"
                                                                            {{ $ebillStructure->customer_pan_permission == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <div class="ebill-sub-custom">
                                                                        <input type="text"
                                                                            class="form-control all-enteradd"
                                                                            placeholder="PAN" name="customer_pan"
                                                                            maxlength="10"
                                                                            value="{{ $ebillStructure->customer_pan }}">
                                                                        <span class="category-error p-error1"
                                                                            id="customer_pan_error"></span>

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 ebill-set no-padding">
                                                                    <input type="text" placeholder="Priority"
                                                                        id="customer_pan_priority_id"
                                                                        class="form-control all-enteradd"
                                                                        name="customer_pan_priority"
                                                                        onkeypress="return isNumberKey(event);"
                                                                        maxlength="2"
                                                                        value="{{ $ebillStructure->customer_pan_priority }}">
                                                                    <span id="customer_pan_priorityerror"></span>
                                                                </div>
                                                            </div>
                                                            @if ($merchant->ebill_version == 2)
                                                                <div class="col-md-4">
                                                                    <div class="col-md-10 no-padding-left">
                                                                        <label class="pure-material-checkbox">
                                                                            <input id="edit_profile_permission"
                                                                                class="all-enteradd" type="checkbox"
                                                                                name="edit_profile_permission"
                                                                                value="1"
                                                                                {{ $ebillStructure->edit_profile_permission == 1 ? 'checked' : '' }}>
                                                                            <span></span>
                                                                        </label>
                                                                        <div class="ebill-sub-custom">
                                                                            <span>Edit Profile</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading panel-heading-ebill" role="tab">
                                            <h4 class="panel-title">
                                                <div class="col-xs-4 no-padding">
                                                    <label class="pure-material-checkbox">
                                                        <input id="item_details_permission_id" type="checkbox"
                                                            class="all-enteradd chk_priority" value="1"
                                                            name="item_details_permission"
                                                            {{ $ebillStructure->item_details_permission == 1 ? 'checked' : '' }}>
                                                        <span>Item Details</span>
                                                    </label>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="col-md-offset-6 col-md-2">
                                                    <input type="text" id="item_details_priority_id"
                                                        class="form-control all-enteradd cl_priority"
                                                        placeholder="Priority" name="item_details_priority"
                                                        onkeypress="return isNumberKey(event);" maxlength="2"
                                                        value="{{ $ebillStructure->item_details_priority }}">
                                                    <span id="item_details_priorityerror"></span>
                                                </div>
                                                <div class="clearfix"></div>
                                            </h4>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div id="collapseOne"
                                            class="item_details_collapse panel-collapse collapse in">
                                            <div class="panel-body panel-body-item-details">
                                                <div class="panel-ebill">
                                                    <div class="row">
                                                        <div class="ebill-sub-panel">
                                                            <div class="col-md-4">
                                                                <div class="col-md-10 no-padding-left">
                                                                    <label class="pure-material-checkbox">
                                                                        <input id="items_permission_id"
                                                                            class="all-enteradd" type="checkbox"
                                                                            onclick="item_name_permission();"
                                                                            name="items_permission" value="1"
                                                                            {{ $ebillStructure->items_permission == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <div class="ebill-sub-custom">
                                                                        <input type="text"
                                                                            class="form-control all-enteradd"
                                                                            placeholder="Items" name="items_name"
                                                                            maxlength="50"
                                                                            value="{{ $ebillStructure->items_name }}">
                                                                        <span class="category-error p-error1"
                                                                            id="items_name_error"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 ebill-set no-padding">
                                                                    @if ($merchant->ebill_version == 1)
                                                                        <input type="text" placeholder="Priority"
                                                                            id="items_priority_id"
                                                                            class="form-control all-enteradd"
                                                                            name="items_priority"
                                                                            onkeypress="return isNumberKey(event);"
                                                                            maxlength="1"
                                                                            value="{{ $ebillStructure->items_priority }}">
                                                                        <span id="items_priorityerror"></span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="col-md-10 no-padding-left">
                                                                    <label class="pure-material-checkbox">
                                                                        <input id="bar_code_permission_id"
                                                                            class="all-enteradd" type="checkbox"
                                                                            name="bar_code_permission"
                                                                            value="1"
                                                                            {{ $ebillStructure->bar_code_permission == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <div class="ebill-sub-custom">
                                                                        <input type="text"
                                                                            class="form-control all-enteradd"
                                                                            placeholder="Code" name="bar_code_name"
                                                                            maxlength="50"
                                                                            value="{{ $ebillStructure->bar_code_name }}">
                                                                        <span class="category-error p-error1"
                                                                            id="bar_code_name_error"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 ebill-set no-padding">
                                                                    @if ($merchant->ebill_version == 1)
                                                                        <input type="text" placeholder="Priority"
                                                                            id="bar_code_priority_id"
                                                                            class="form-control all-enteradd"
                                                                            name="bar_code_priority"
                                                                            onkeypress="return isNumberKey(event);"
                                                                            maxlength="1"
                                                                            value="{{ $ebillStructure->bar_code_priority }}">
                                                                        <span id="bar_code_priorityerror"></span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="col-md-10 no-padding-left">
                                                                    <label class="pure-material-checkbox">
                                                                        <input id="item_tax_permission_id"
                                                                            type="checkbox"
                                                                            name="item_tax_permission"
                                                                            class="all-enteradd" value="1"
                                                                            {{ $ebillStructure->item_tax_permission == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <div class="ebill-sub-custom">
                                                                        <input type="text"
                                                                            class="form-control all-enteradd"
                                                                            placeholder="Taxes" name="item_tax_name"
                                                                            maxlength="50"
                                                                            value="{{ $ebillStructure->item_tax_name }}">
                                                                        <span class="category-error p-error1"
                                                                            id="item_tax_name_error"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 ebill-set no-padding">
                                                                    @if ($merchant->ebill_version == 1)
                                                                        <input type="text" placeholder="Priority"
                                                                            id="item_tax_priority_id"
                                                                            class="form-control all-enteradd"
                                                                            name="item_tax_priority"
                                                                            onkeypress="return isNumberKey(event);"
                                                                            maxlength="1"
                                                                            value="{{ $ebillStructure->item_tax_priority }}">
                                                                        <span id="item_tax_priorityerror"></span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <!-- <div class="col-md-4">
                 <div class="col-md-10 no-padding-left">
                  <label class="pure-material-checkbox">
       <input id="slno_permission_id" type="checkbox" name="slno_permission" value="1" {{ $ebillStructure->slno_permission == 1 ? 'checked' : '' }}>
       <span></span>
                  </label>
                  <div class="ebill-sub-custom">
                   <input type="text" class="form-control" placeholder="SL.No" name="slno_name"  maxlength="50" value="{{ $ebillStructure->slno_name }}">
                  </div>
                 </div>
                 <div class="col-md-2 ebill-set no-padding">
                  <input type="text" placeholder="Priority" class="form-control" name="slno_priority" onkeypress="return isNumberKey(event);" maxlength="1" value="{{ $ebillStructure->slno_priority }}">
                 </div>
                 <span class="category-error p-error1" id="slno_priorityerror"></span>
               </div> -->
                                                            <div class="clearfix"></div>
                                                        </div>

                                                        <div class="ebill-sub-panel">
                                                            <div class="col-md-4">
                                                                <div class="col-md-10 no-padding-left">
                                                                    <label class="pure-material-checkbox">
                                                                        <input id="hsn_code_permission_id"
                                                                            class="all-enteradd" type="checkbox"
                                                                            name="hsn_code_permission"
                                                                            value="1"
                                                                            {{ $ebillStructure->hsn_code_permission == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <div class="ebill-sub-custom">
                                                                        <input type="text"
                                                                            class="form-control all-enteradd"
                                                                            placeholder="HSIN" name="hsn_code_name"
                                                                            maxlength="50"
                                                                            value="{{ $ebillStructure->hsn_code_name }}">
                                                                        <span class="category-error p-error1"
                                                                            id="hsn_code_name_error"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 ebill-set no-padding">
                                                                    @if ($merchant->ebill_version == 1)
                                                                        <input type="text" placeholder="Priority"
                                                                            id="hsn_code_priority_id"
                                                                            class="form-control all-enteradd"
                                                                            name="hsn_code_priority"
                                                                            onkeypress="return isNumberKey(event);"
                                                                            maxlength="1"
                                                                            value="{{ $ebillStructure->hsn_code_priority }}">
                                                                        <span id="hsn_code_priorityerror"></span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="col-md-10 no-padding-left">
                                                                    <label class="pure-material-checkbox">
                                                                        <input id="item_quantity_permission_id"
                                                                            type="checkbox"
                                                                            name="item_quantity_permission"
                                                                            class="all-enteradd" value="1"
                                                                            {{ $ebillStructure->item_quantity_permission == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <div class="ebill-sub-custom">
                                                                        <input type="text"
                                                                            class="form-control all-enteradd"
                                                                            placeholder="Quantity"
                                                                            name="item_quantity_name" maxlength="50"
                                                                            value="{{ $ebillStructure->item_quantity_name }}">
                                                                        <span
                                                                            class="category-error p-error1 p-sub-error"
                                                                            id="item_quantity_name_error"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 ebill-set no-padding">
                                                                    <input type="text" placeholder="Priority"
                                                                        id="item_quantity_priority_id"
                                                                        class="form-control all-enteradd"
                                                                        name="item_quantity_priority"
                                                                        onkeypress="return isNumberKey(event);"
                                                                        maxlength="1"
                                                                        value="{{ $ebillStructure->item_quantity_priority }}">
                                                                    <span id="item_quantity_priorityerror"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="col-md-10 no-padding-left">
                                                                    <label class="pure-material-checkbox">
                                                                        <input id="marked_price_permission_id"
                                                                            class="mrprspchecked" type="checkbox"
                                                                            name="marked_price_permission"
                                                                            class="all-enteradd" value="1"
                                                                            {{ $ebillStructure->marked_price_permission == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <div class="ebill-sub-custom">
                                                                        <input type="text"
                                                                            class="form-control all-enteradd"
                                                                            placeholder="MRP"
                                                                            name="marked_price_name" maxlength="50"
                                                                            value="{{ $ebillStructure->marked_price_name }}">
                                                                        <span class="category-error p-error1"
                                                                            id="marked_price_name_error"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 ebill-set no-padding">
                                                                    <input type="text" placeholder="Priority"
                                                                        id="marked_price_priority_id"
                                                                        class="form-control all-enteradd"
                                                                        name="marked_price_priority"
                                                                        onkeypress="return isNumberKey(event);"
                                                                        maxlength="1"
                                                                        value="{{ $ebillStructure->marked_price_priority }}">
                                                                    <span id="marked_price_priorityerror"></span>
                                                                </div>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div class="ebill-sub-panel">
                                                            <div class="col-md-4">
                                                                <div class="col-md-10 no-padding-left">
                                                                    <label class="pure-material-checkbox">
                                                                        <input id="item_rate_permission_id"
                                                                            type="checkbox"
                                                                            name="item_rate_permission"
                                                                            class="all-enteradd" value="1"
                                                                            {{ $ebillStructure->item_rate_permission == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <div class="ebill-sub-custom">
                                                                        <input type="text"
                                                                            class="form-control all-enteradd"
                                                                            placeholder="Rate" name="item_rate_name"
                                                                            maxlength="50"
                                                                            value="{{ $ebillStructure->item_rate_name }}">
                                                                        <span class="category-error p-error1"
                                                                            id="item_rate_name_error"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 ebill-set no-padding">
                                                                    <input type="text" placeholder="Priority"
                                                                        id="item_rate_priority_id"
                                                                        class="form-control all-enteradd"
                                                                        name="item_rate_priority"
                                                                        onkeypress="return isNumberKey(event);"
                                                                        maxlength="1"
                                                                        value="{{ $ebillStructure->item_rate_priority }}">
                                                                    <span id="item_rate_priorityerror"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="col-md-10 no-padding-left">
                                                                    <label class="pure-material-checkbox">
                                                                        <input id="item_price_permission_id"
                                                                            class="all-enteradd" type="checkbox"
                                                                            name="item_price_permission"
                                                                            value="1"
                                                                            {{ $ebillStructure->item_price_permission == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <div class="ebill-sub-custom">
                                                                        <input type="text"
                                                                            class="form-control all-enteradd"
                                                                            placeholder="Price"
                                                                            name="item_price_name" maxlength="50"
                                                                            value="{{ $ebillStructure->item_price_name }}">
                                                                        <span class="category-error p-error1"
                                                                            id="item_price_name_error"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 ebill-set no-padding">
                                                                    <input type="text" placeholder="Priority"
                                                                        id="item_price_priority_id"
                                                                        class="form-control all-enteradd"
                                                                        name="item_price_priority"
                                                                        onkeypress="return isNumberKey(event);"
                                                                        maxlength="1"
                                                                        value="{{ $ebillStructure->item_price_priority }}">
                                                                    <span id="item_price_priorityerror"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="col-md-10 no-padding-left">
                                                                    <label class="pure-material-checkbox">
                                                                        <input id="item_discount_permission_id"
                                                                            class="all-enteradd" type="checkbox"
                                                                            name="item_discount_permission"
                                                                            value="1"
                                                                            {{ $ebillStructure->item_discount_permission == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <div class="ebill-sub-custom">
                                                                        <input type="text"
                                                                            class="form-control all-enteradd"
                                                                            placeholder="Discount"
                                                                            name="item_discount_name" maxlength="50"
                                                                            value="{{ $ebillStructure->item_discount_name }}">
                                                                        <span class="category-error p-error1"
                                                                            id="item_discount_name_error"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 ebill-set no-padding">
                                                                    <input type="text" placeholder="Priority"
                                                                        id="item_discount_priority_id"
                                                                        class="form-control all-enteradd"
                                                                        name="item_discount_priority"
                                                                        onkeypress="return isNumberKey(event);"
                                                                        maxlength="1"
                                                                        value="{{ $ebillStructure->item_discount_priority }}">
                                                                    <span id="item_discount_priorityerror"></span>
                                                                </div>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div class="ebill-sub-panel">
                                                            <div class="col-md-4">
                                                                <div class="col-md-10 no-padding-left">
                                                                    <label class="pure-material-checkbox item_class">
                                                                        <input id="addon_item_permission_id"
                                                                            class="all-enteradd" type="checkbox"
                                                                            class="item_class"
                                                                            name="addon_item_permission"
                                                                            value="1"
                                                                            {{ $ebillStructure->addon_item_permission == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <p class="round-off item_class">Addon Item</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="col-md-10 no-padding-left">
                                                                    <label class="pure-material-checkbox item_class">
                                                                        <input id="addon_category_permission_id"
                                                                            class="all-enteradd" type="checkbox"
                                                                            name="addon_category_permission"
                                                                            value="1"
                                                                            {{ $ebillStructure->addon_category_permission == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <p class="round-off item_class">Addon Category</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="col-md-10 no-padding-left">
                                                                    <label class="pure-material-checkbox">
                                                                        <input id="rsp_permission_id"
                                                                            class="mrprspchecked" type="checkbox"
                                                                            name="item_rsv_permission"
                                                                            value="1"
                                                                            {{ $ebillStructure->item_rsv_permission == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <div class="ebill-sub-custom">
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Retail Sale Price"
                                                                            name="item_rsv_name" maxlength="50"
                                                                            value="{{ $ebillStructure->item_rsv_name }}">
                                                                        <span class="category-error p-error1"
                                                                            id="item_rsv_name_error"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 ebill-set no-padding">
                                                                    <input type="text" placeholder="Priority"
                                                                        class="form-control"
                                                                        name="item_rsv_priority"
                                                                        id="item_rsv_priority"
                                                                        onkeypress="return isNumberKey(event);"
                                                                        maxlength="2"
                                                                        value="{{ $ebillStructure->item_rsv_priority }}">
                                                                    <span id="rsp_priorityerror"></span>
                                                                </div>
                                                                <!-- <span class="category-error p-error1" id="rsp_priorityerror"></span> -->
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div class="ebill-sub-panel">
                                                            <div class="col-md-4">
                                                                <div class="col-md-10 no-padding-left">
                                                                    <label class="pure-material-checkbox">
                                                                        <input id="lpd_permission_id"
                                                                            class="lpdchecked" type="checkbox"
                                                                            name="item_lpd_permission"
                                                                            value="1"
                                                                            {{ $ebillStructure->lp_discount_based_calculation == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <div class="ebill-sub-custom">
                                                                        <p class="">LP Discount Based
                                                                            Calculation</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="col-md-10 no-padding-left">
                                                                    <label class="pure-material-checkbox">
                                                                        <input id="item_department_display"
                                                                            class="item_department_display"
                                                                            type="checkbox"
                                                                            name="item_department_display"
                                                                            value="1"
                                                                            {{ $ebillStructure->item_department_display == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <div class="ebill-sub-custom">
                                                                        <p class="">Department</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="col-md-10 no-padding-left">
                                                                    <label class="pure-material-checkbox">
                                                                        <input
                                                                            id="item_sales_person_name_number_display"
                                                                            class="item_sales_person_name_number_display"
                                                                            type="checkbox"
                                                                            name="item_sales_person_name_number_display"
                                                                            value="1"
                                                                            {{ $ebillStructure->item_sales_person_name_number_display == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <div class="ebill-sub-custom">
                                                                        <p class="">Sales Person Name & Number
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading panel-heading-ebill" role="tab">
                                            <h4 class="panel-title">
                                                <div class="col-xs-4 no-padding">
                                                    <label class="pure-material-checkbox">
                                                        <input id="other_details_permission_id"
                                                            class="all-enteradd chk_priority" type="checkbox"
                                                            value="1" name="other_details_permission"
                                                            {{ $ebillStructure->other_details_permission == 1 ? 'checked' : '' }}>
                                                        <span>Other Details</span>
                                                    </label>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="col-md-offset-6 col-md-2">
                                                    <input type="text" id="other_details_priority_id"
                                                        class="form-control all-enteradd cl_priority"
                                                        placeholder="Priority" name="other_details_priority"
                                                        onkeypress="return isNumberKey(event);" maxlength="2"
                                                        value="{{ $ebillStructure->other_details_priority }}" />
                                                    <span id="other_details_priorityerror"></span>
                                                </div>
                                                <div class="clearfix"></div>
                                            </h4>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div id="collapseOne"
                                            class="other_details_collapse panel-collapse collapse in">
                                            <div class="panel-body panel-body-other-details">
                                                <div class="panel-ebill">
                                                    <div class="row">
                                                        <div class="ebill-sub-panel">
                                                            <div class="col-md-4">
                                                                <div class="col-md-10 no-padding-left">
                                                                    <label class="pure-material-checkbox">
                                                                        <input id="sub_total_permission_id"
                                                                            class="all-enteradd" type="checkbox"
                                                                            name="sub_total_permission"
                                                                            value="1"
                                                                            {{ $ebillStructure->sub_total_permission == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <div class="ebill-sub-custom">
                                                                        <input type="text"
                                                                            class="form-control all-enteradd"
                                                                            placeholder="Sub- total"
                                                                            name="sub_total_name" maxlength="50"
                                                                            value="{{ $ebillStructure->sub_total_name }}">
                                                                        <span class="category-error p-error1"
                                                                            id="sub_total_error"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 ebill-set no-padding">
                                                                    <input type="text" placeholder="Priority"
                                                                        id="sub_total_priority_id"
                                                                        class="form-control all-enteradd"
                                                                        name="sub_total_priority"
                                                                        onkeypress="return isNumberKey(event);"
                                                                        maxlength="1"
                                                                        value="{{ $ebillStructure->sub_total_priority }}">
                                                                    <span id="sub_total_priorityerror"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="col-md-10 no-padding-left">
                                                                    <label class="pure-material-checkbox">
                                                                        <input id="tax_permission_id"
                                                                            class="all-enteradd" type="checkbox"
                                                                            name="tax_permission" value="1"
                                                                            {{ $ebillStructure->tax_permission == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <div class="ebill-sub-custom">
                                                                        <input type="text"
                                                                            class="form-control all-enteradd"
                                                                            placeholder="Tax" name="tax_name"
                                                                            maxlength="50"
                                                                            value="{{ $ebillStructure->tax_name }}">
                                                                        <span class="category-error p-error1"
                                                                            id="tax_name_error"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 ebill-set no-padding">
                                                                    <input type="text" placeholder="Priority"
                                                                        id="tax_priority_id"
                                                                        class="form-control all-enteradd"
                                                                        name="tax_priority"
                                                                        onkeypress="return isNumberKey(event);"
                                                                        maxlength="1"
                                                                        value="{{ $ebillStructure->tax_priority }}">
                                                                    <span id="tax_priorityerror"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="col-md-10 no-padding-left">
                                                                    <label class="pure-material-checkbox">
                                                                        <input id="charges_permission_id"
                                                                            class="all-enteradd" type="checkbox"
                                                                            name="charges_permission" value="1"
                                                                            {{ $ebillStructure->charges_permission == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <div class="ebill-sub-custom">
                                                                        <input type="text"
                                                                            class="form-control all-enteradd"
                                                                            placeholder="Other Charges"
                                                                            name="charges_name" maxlength="50"
                                                                            value="{{ $ebillStructure->charges_name }}">
                                                                        <span
                                                                            class="category-error p-error1 p-sub-error"
                                                                            id="charges_name_error"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 ebill-set no-padding">
                                                                    <input type="text" placeholder="Priority"
                                                                        id="charges_priority_id"
                                                                        class="form-control all-enteradd"
                                                                        name="charges_priority"
                                                                        onkeypress="return isNumberKey(event);"
                                                                        maxlength="1"
                                                                        value="{{ $ebillStructure->charges_priority }}">
                                                                    <span id="charges_priorityerror"></span>
                                                                </div>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>

                                                        <div class="ebill-sub-panel">
                                                            <div class="col-md-4">
                                                                <div class="col-md-10 no-padding-left">
                                                                    <label class="pure-material-checkbox">
                                                                        <input id="discount_permission_id"
                                                                            class="all-enteradd" type="checkbox"
                                                                            name="discount_permission"
                                                                            value="1"{{ $ebillStructure->discount_permission == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <div class="ebill-sub-custom">
                                                                        <input type="text"
                                                                            class="form-control all-enteradd"
                                                                            placeholder="Discount"
                                                                            name="discount_name" maxlength="50"
                                                                            value="{{ $ebillStructure->discount_name }}">
                                                                        <span class="category-error p-error1"
                                                                            id="discount_name_error"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 ebill-set no-padding">
                                                                    <input type="text" placeholder="Priority"
                                                                        id="discount_priority_id"
                                                                        class="form-control all-enteradd"
                                                                        name="discount_priority"
                                                                        onkeypress="return isNumberKey(event);"
                                                                        maxlength="1"
                                                                        value="{{ $ebillStructure->discount_priority }}">
                                                                    <span id="discount_priorityerror"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="col-md-10 no-padding-left">
                                                                    <label class="pure-material-checkbox">
                                                                        <input id="points_redeemed_permission_id"
                                                                            type="checkbox"
                                                                            name="points_redeemed_permission"
                                                                            class="all-enteradd" value="1"
                                                                            {{ $ebillStructure->points_redeemed_permission == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <div class="ebill-sub-custom">
                                                                        <input type="text"
                                                                            class="form-control all-enteradd"
                                                                            placeholder="Points Redeemed"
                                                                            name="points_redeemed_name"
                                                                            maxlength="50"
                                                                            value="{{ $ebillStructure->points_redeemed_name }}">
                                                                        <span class="category-error p-error1"
                                                                            id="points_redeemed_name_error"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 ebill-set no-padding">
                                                                    <input type="text" placeholder="Priority"
                                                                        id="points_redeemed_priority_id"
                                                                        class="form-control all-enteradd"
                                                                        name="points_redeemed_priority"
                                                                        onkeypress="return isNumberKey(event);"
                                                                        maxlength="1"
                                                                        value="{{ $ebillStructure->points_redeemed_priority }}">
                                                                    <span id="points_redeemed_priorityerror"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="col-md-10 no-padding-left">
                                                                    <label class="pure-material-checkbox">
                                                                        <input id="gross_amount_permission_id"
                                                                            type="checkbox"
                                                                            name="gross_amount_permission"
                                                                            class="all-enteradd" value="1"
                                                                            {{ $ebillStructure->gross_amount_permission == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <div class="ebill-sub-custom">
                                                                        <input type="text"
                                                                            class="form-control all-enteradd"
                                                                            placeholder="Gross Amount"
                                                                            name="gross_amount_name" maxlength="50"
                                                                            value="{{ $ebillStructure->gross_amount_name }}">
                                                                        <span class="category-error p-error1"
                                                                            id="gross_amount_name_error"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 ebill-set no-padding">
                                                                    <input type="text" placeholder="Priority"
                                                                        id="gross_amount_priority_id"
                                                                        class="form-control all-enteradd"
                                                                        name="gross_amount_priority"
                                                                        onkeypress="return isNumberKey(event);"
                                                                        maxlength="1"
                                                                        value="{{ $ebillStructure->gross_amount_priority }}">
                                                                    <span id="gross_amount_priorityerror"></span>
                                                                </div>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading panel-heading-ebill" role="tab">
                                            <h4 class="panel-title">
                                                <div class="col-xs-4 no-padding">
                                                    <label class="pure-material-checkbox">
                                                        <input id="payment_details_permission_id"
                                                            class="all-enteradd chk_priority" type="checkbox"
                                                            value="1" name="payment_details_permission"
                                                            {{ $ebillStructure->payment_details_permission == 1 ? 'checked' : '' }}>
                                                        <span>Payment Details</span>
                                                    </label>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="col-md-offset-6 col-md-2">
                                                    <input type="text" id="payment_details_priority_id"
                                                        class="form-control all-enteradd cl_priority"
                                                        placeholder="Priority" name="payment_details_priority"
                                                        onkeypress="return isNumberKey(event);" maxlength="2"
                                                        value="{{ $ebillStructure->payment_details_priority }}" />
                                                    <span id="payment_details_priorityerror"></span>
                                                </div>
                                                <div class="clearfix"></div>
                                            </h4>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div id="collapseOne"
                                            class="payment_details_collapse panel-collapse collapse in">
                                            <div class="panel-body panel-body-payment-details">
                                                <div class="panel-ebill">
                                                    <div class="row">
                                                        <div class="ebill-sub-panel">
                                                            <div class="col-md-4">
                                                                <div class="col-md-10 no-padding-left">
                                                                    <label class="pure-material-checkbox">
                                                                        <input id="netbill_paid_permission_id"
                                                                            type="checkbox"
                                                                            name="netbill_paid_permission"
                                                                            class="all-enteradd" value="1"
                                                                            {{ $ebillStructure->netbill_paid_permission == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <div class="ebill-sub-custom">
                                                                        <input type="text"
                                                                            class="form-control all-enteradd"
                                                                            placeholder="Net Bill Paid"
                                                                            name="netbill_paid_name" maxlength="50"
                                                                            value="{{ $ebillStructure->netbill_paid_name }}">
                                                                        <span class="category-error p-error1"
                                                                            id="netbill_paid_name_error"></span>
                                                                    </div>
                                                                </div>
                                                                @if ($merchant->ebill_version == 1)
                                                                    <div class="col-md-2 ebill-set no-padding">
                                                                        <input type="text" placeholder="Priority"
                                                                            id="netbill_paid_priority_id"
                                                                            class="form-control all-enteradd"
                                                                            name="netbill_paid_priority"
                                                                            onkeypress="return isNumberKey(event);"
                                                                            maxlength="1"
                                                                            value="{{ $ebillStructure->netbill_paid_priority }}">
                                                                        <span id="netbill_paid_priorityerror"></span>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="col-md-10 no-padding-left">
                                                                    <label class="pure-material-checkbox">
                                                                        <input id="amount_due_permission_id"
                                                                            type="checkbox"
                                                                            name="amount_due_permission"
                                                                            class="all-enteradd"
                                                                            onclick="amount_due_permission_validation();"
                                                                            value="1"
                                                                            {{ $ebillStructure->amount_due_permission == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <div class="ebill-sub-custom">
                                                                        <input type="text"
                                                                            class="form-control all-enteradd"
                                                                            placeholder="Amount Due"
                                                                            name="amount_due_name" maxlength="50"
                                                                            value="{{ $ebillStructure->amount_due_name }}">
                                                                        <span class="category-error p-error1"
                                                                            id="amount_due_name_error"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 ebill-set no-padding">
                                                                    <input type="text" placeholder="Priority"
                                                                        id="amount_due_priority_id"
                                                                        class="form-control all-enteradd"
                                                                        name="amount_due_priority"
                                                                        onkeypress="return isNumberKey(event);"
                                                                        maxlength="1"
                                                                        value="{{ $ebillStructure->amount_due_priority }}">
                                                                    <span id="amount_due_priorityerror"></span>
                                                                </div>
                                                            </div>
                                                            <!--  06.12.2021 <div class="col-md-4">
                <div class="col-md-10 no-padding-left">
                 <label class="pure-material-checkbox">
      <input id="mode_of_payment_permission_id" type="checkbox" name="mode_of_payment_permission" value="1" {{ $ebillStructure->mode_of_payment_permission == 1 ? 'checked' : '' }}>
      <span></span>
                 </label>
                 <div class="ebill-sub-custom">
                  <input type="text" class="form-control" placeholder="Payment Mode" name="mode_of_payment_name"  maxlength="50" value="{{ $ebillStructure->mode_of_payment_name }}">
                  <span class="category-error p-error1 p-sub-error" id="mode_of_payment_name_error"></span>
                 </div>
                </div>
                <div class="col-md-2 ebill-set no-padding">
                 <input type="text"  class="form-control" name="mode_of_payment_priority"  placeholder="Priority"  onkeypress="return isNumberKey(event);" maxlength="1" value="{{ $ebillStructure->mode_of_payment_priority }}">
                 <span class="category-error p-error1 p-sub-error" id="mode_of_payment_priorityerror"></span>
                </div>
               </div> -->
                                                            <div class="clearfix"></div>
                                                        </div>

                                                        <div class="ebill-sub-panel">
                                                            <div class="col-md-4">
                                                                <div class="col-md-10 no-padding-left">
                                                                    <label class="pure-material-checkbox">
                                                                        <input id="amount_in_words_permission_id"
                                                                            class="all-enteradd" type="checkbox"
                                                                            name="amount_in_words_permission"
                                                                            value="1"
                                                                            {{ $ebillStructure->amount_in_words_permission == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <div class="ebill-sub-custom">
                                                                        <input type="text"
                                                                            class="form-control all-enteradd"
                                                                            placeholder="Amount in words"
                                                                            name="amount_in_words_name"
                                                                            maxlength="50"
                                                                            value="{{ $ebillStructure->amount_in_words_name }}">
                                                                        <span class="category-error p-error1 "
                                                                            id="amount_in_words_name_error"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 ebill-set no-padding">
                                                                    <input type="text" placeholder="Priority"
                                                                        id="amount_in_words_priority_id"
                                                                        class="form-control all-enteradd"
                                                                        name="amount_in_words_priority"
                                                                        onkeypress="return isNumberKey(event);"
                                                                        maxlength="1"
                                                                        value="{{ $ebillStructure->amount_in_words_priority }}">
                                                                    <span id="amount_in_words_priorityerror"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="col-md-10 no-padding-left">
                                                                    <label class="pure-material-checkbox">
                                                                        <input id="roundoff_permission_id"
                                                                            class="all-enteradd" type="checkbox"
                                                                            value="1"name="roundoff_permission"
                                                                            {{ $ebillStructure->roundoff_permission == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <div class="ebill-sub-custom">
                                                                        <input type="text"
                                                                            class="form-control all-enteradd"
                                                                            placeholder="Round Off"
                                                                            name="roundoff_name" maxlength="50"
                                                                            value="{{ $ebillStructure->roundoff_name }}">
                                                                        <span class="category-error p-error1 "
                                                                            id="roundoff_name_error"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 ebill-set no-padding">
                                                                    <input type="text" placeholder="Priority"
                                                                        id="roundoff_priority_id"
                                                                        class="form-control all-enteradd"
                                                                        name="roundoff_priority"
                                                                        onkeypress="return isNumberKey(event);"
                                                                        maxlength="1"
                                                                        value="{{ $ebillStructure->roundoff_priority }}">
                                                                    <span id="roundoff_priorityerror"></span>
                                                                </div>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- 		*****
         ***** -->
                                    @if ($merchant->ebill_version == 1)
                                        <div class="panel panel-default">
                                            <div class="panel-heading panel-heading-ebill panel-ebill-set"
                                                role="tab">
                                                <h4 class="panel-title">
                                                    <div class="col-xs-4 no-padding input-padding-set">
                                                        <label class="pure-material-checkbox body-inner-checkbox">
                                                            <input name="tax_checkbox"
                                                                id="ebillupdate_permission_id"
                                                                class="update_check all-enteradd chk_priority"
                                                                type="checkbox" value="1"
                                                                {{ $ebillStructure->totalbill_tax_permission == 1 ? 'checked' : '' }}>
                                                            <span></span>
                                                        </label>
                                                        <input class="text-info update-next form-control all-enteradd"
                                                            id="text_reserv" maxlength="30" readonly
                                                            placeholder="Tax Invoice" name="billtax_name"
                                                            value="{{ $ebillStructure->totalbill_tax_name }}">
                                                        <span class="category-error p-error1 ebill-span"
                                                            id="ebillup_name_error"></span>

                                                        <img id="update_reserv" style="display: none;"
                                                            src="https://ewardsmain.s3.ap-southeast-1.amazonaws.com/menumodule/pencil.png" />
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div class="col-md-offset-6 col-md-2">
                                                        <input type="text" id="ebill_updates_priority_id"
                                                            class="form-control all-enteradd cl_priority"
                                                            placeholder="Priority" name="ebill_updates_priority"
                                                            onkeypress="return isNumberKey(event);" maxlength="2"
                                                            value="{{ $ebillStructure->totalbill_tax_priority }}">
                                                        <span class="category-error p-error1"
                                                            id="ebill_updates_priority_priorityerror"></span>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </h4>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    @endif
                                    <!-- 	*******
         ****** -->
                                    @if ($merchant->ebill_version == 2)
                                        <div class="panel panel-default">
                                            <div class="panel-heading panel-heading-ebill panel-ebill-set"
                                                role="tab">
                                                <h4 class="panel-title">
                                                    <!-- <div class="col-md-4 no-padding input-padding-set">
             <label class="pure-material-checkbox body-inner-checkbox">
              <input name="edit_profile_permission" id="edit_profile_permission" class="update_check all-enteradd" type="checkbox" value="1"
              {{ $ebillStructure->edit_profile_permission == 1 ? 'checked' : '' }}>
              <span>Edit Profile</span>
             </label>
             <div class="clearfix"></div>
            </div> -->
                                                    <div class="col-xs-4 no-padding">
                                                        <label class="pure-material-checkbox body-inner-checkbox">
                                                            @if ($ebillStructure->other_details_permission == 1)
                                                                <input name="display_points_summary_permission"
                                                                    id="display_points_summary_permission"
                                                                    class="update_check all-enteradd"
                                                                    type="checkbox" value="1"
                                                                    {{ $ebillStructure->display_points_summary_permission == 1 ? 'checked' : '' }}>
                                                                <span id="sp_pntsmr">Point Summary</span>
                                                            @else
                                                                <input name="display_points_summary_permission"
                                                                    id="display_points_summary_permission"
                                                                    class="update_check all-enteradd chkbox_disabled"
                                                                    type="checkbox" value="1"
                                                                    disabled="disabled">
                                                                <span id="sp_pntsmr" class="company-set">Point
                                                                    Summary</span>
                                                            @endif
                                                        </label>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div class="col-md-offset-6 col-md-2">
                                                        <input type="text" placeholder="Priority"
                                                            id="display_point_summary_priority"
                                                            class="form-control all-enteradd cl_priority"
                                                            name="display_point_summary_priority"
                                                            onkeypress="return isNumberKey(event);" maxlength="2"
                                                            value="{{ $ebillStructure->display_point_summary_priority }}">
                                                        <span id="display_point_summary_priorityerror"></span>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </h4>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div id="collapseOne"
                                                class="points_summary_collapse panel-collapse collapse in">
                                                <div class="panel-body panel-body-points-summary">
                                                    <div class="panel-ebill">
                                                        <div class="row">
                                                            <div class="ebill-sub-panel">
                                                                <div class="col-md-3">
                                                                    <div class="col-md-10 no-padding-left">
                                                                        <label class="pure-material-checkbox">
                                                                            <input id="available_points_permission"
                                                                                class="all-enteradd" type="checkbox"
                                                                                name="available_points_permission"
                                                                                value="1"
                                                                                {{ $ebillStructure->available_points_permission == 1 ? 'checked' : '' }}>
                                                                            <span></span>
                                                                        </label>
                                                                        <div class="ebill-sub-custom">
                                                                            <input type="text"
                                                                                class="form-control"
                                                                                placeholder="Enter Available Points Name"
                                                                                name="available_points_name"
                                                                                id="available_points_name"
                                                                                maxlength="55"
                                                                                value="{{ $ebillStructure->available_points_name ? $ebillStructure->available_points_name : 'Available Points' }}" />
                                                                            <span class="category-error p-error1"
                                                                                id="available_points_name_error"></span>
                                                                        </div>
                                                                        <span class="category-error"
                                                                            id="login_linkerror"></span>
                                                                    </div>
                                                                    <div class="col-md-2 ebill-set no-padding">

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="col-md-10 no-padding-left">
                                                                        <label class="pure-material-checkbox">
                                                                            <input id="points_earned_permission"
                                                                                class="all-enteradd" type="checkbox"
                                                                                name="points_earned_permission"
                                                                                value="1"
                                                                                {{ $ebillStructure->points_earned_permission == 1 ? 'checked' : '' }}>
                                                                            <span></span>
                                                                        </label>
                                                                        <div class="ebill-sub-custom">
                                                                            <input type="text"
                                                                                class="form-control"
                                                                                placeholder="Enter Points Earned Name"
                                                                                name="points_earned_name"
                                                                                id="points_earned_name"
                                                                                maxlength="55"
                                                                                value="{{ $ebillStructure->points_earned_name ? $ebillStructure->points_earned_name : 'Points Earned' }}" />
                                                                            <span class="category-error p-error1"
                                                                                id="points_earned_name_error"></span>
                                                                        </div>
                                                                        <span class="category-error"
                                                                            id="login_linkerror"></span>
                                                                    </div>
                                                                    <div class="col-md-2 ebill-set no-padding">

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="col-md-10 no-padding-left">
                                                                        <label class="pure-material-checkbox">
                                                                            <input id="points_redeem_permission"
                                                                                class="all-enteradd" type="checkbox"
                                                                                name="points_redeem_permission"
                                                                                value="1"
                                                                                {{ $ebillStructure->points_redeem_permission == 1 ? 'checked' : '' }}>
                                                                            <span></span>
                                                                        </label>
                                                                        <div class="ebill-sub-custom">
                                                                            <input type="text"
                                                                                class="form-control"
                                                                                placeholder="Enter Available Points Name"
                                                                                name="points_redeem_name"
                                                                                id="points_redeem_name"
                                                                                maxlength="55"
                                                                                value="{{ $ebillStructure->points_redeem_name ? $ebillStructure->points_redeem_name : 'Points Redeemed' }}" />
                                                                            <span class="category-error p-error1"
                                                                                id="points_redeem_name_error"></span>
                                                                        </div>
                                                                        <span class="category-error"
                                                                            id="login_linkerror"></span>
                                                                    </div>
                                                                    <div class="col-md-2 ebill-set no-padding">

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label class="pure-material-checkbox">
                                                                        <input id="points_expiry_permission"
                                                                            class="all-enteradd" type="checkbox"
                                                                            name="points_expiry_permission"
                                                                            value="1"{{ $ebillStructure->points_expiry_permission == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <p class="round-off">Points Expiry</p>

                                                                </div>

                                                                <div class="clearfix"></div>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="panel panel-default">
                                        <div class="panel-heading panel-heading-ebill panel-ebill-set"
                                            role="tab">
                                            <h4 class="panel-title">
                                                <div class="col-xs-4 no-padding">
                                                    <label class="pure-material-checkbox body-inner-checkbox">
                                                        <input name="coupon_details_permission"
                                                            id="coupon_details_permission"
                                                            class="update_check all-enteradd chkbox_disabled"
                                                            type="checkbox" value="1"
                                                            {{ $ebillStructure->coupon_details_permission == 1 ? 'checked' : '' }}>
                                                        <span id="sp_pntsmr">Coupon Details</span>
                                                    </label>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="col-md-offset-6 col-md-2">
                                                    <input name="coupon_details_priority"
                                                        id="coupon_details_priority"
                                                        class="form-control all-enteradd cl_priority" type="text"
                                                        value="{{ $ebillStructure->coupon_details_priority }}"
                                                        placeholder="Priority"
                                                        onkeypress="return isNumberKey(event);" maxlength="2">
                                                    <span id="coupon_details_priorityerror"></span>
                                                </div>
                                                <div class="clearfix"></div>
                                            </h4>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div id="collapseOne"
                                            class="coupon_details_collapse panel-collapse collapse in">
                                            <div class="panel-body panel-body-points-summary">
                                                <div class="panel-ebill">
                                                    <div class="row">
                                                        <div class="ebill-sub-panel">
                                                            <div class="col-md-4">
                                                                <label class="pure-material-checkbox">
                                                                    <input id="active_coupon_permission"
                                                                        class="all-enteradd" type="checkbox"
                                                                        name="active_coupon_permission"
                                                                        value="1"{{ $ebillStructure->active_coupon_permission == 1 ? 'checked' : '' }}>
                                                                    <span></span>
                                                                </label>
                                                                <p class="round-off">Active Coupons</p>

                                                            </div>

                                                            <div class="col-md-4">
                                                                <label class="pure-material-checkbox">
                                                                    <input id="on_hold_coupon_permission"
                                                                        class="all-enteradd" type="checkbox"
                                                                        name="on_hold_coupon_permission"
                                                                        value="1"{{ $ebillStructure->on_hold_coupon_permission == 1 ? 'checked' : '' }}>
                                                                    <span></span>
                                                                </label>
                                                                <p class="round-off">On Hold Coupons</p>

                                                            </div>

                                                            <div class="clearfix"></div>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- referral code start -->
                                    <div class="panel panel-default">
                                        <div class="panel-heading panel-heading-ebill panel-ebill-set"
                                            role="tab">
                                            <h4 class="panel-title">
                                                <div class="col-xs-4 no-padding">
                                                    <label id="referral-screen"
                                                        class="pure-material-checkbox body-inner-checkbox">
                                                        <input type="checkbox" id="referralcheckbox"
                                                            name="referral_program_permission"
                                                            value="1"{{ $ebillStructure->referral_program_permission == 1 ? 'checked' : '' }}>

                                                        <span id="sp_pntsmr">Refer & Earn</span>

                                                        <!-- Referral -->
                                                    </label>
                                                </div>
                                            </h4>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="hidepopups panel-body-refer" id="refeeralhide">
                                            <div class="row referral-custom">

                                                <div class="col-md-6">
                                                    <div class="custom-home custom-home-profile">
                                                        <label>Referral heading text</label>
                                                        <div class="clearfix"></div>
                                                        <input type="text" class="form-control"
                                                            name="referral_heading_text" id="referral_heading_text"
                                                            value="{{ $ebillStructure->referral_heading_text }}"
                                                            maxlength="150" placeholder="Referral heading text">
                                                        <span class="category-error p-error1"
                                                            id="referral_heading_text_error"></span>


                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="custom-home custom-home-profile">
                                                        <label>Referral Button Text</label>
                                                        <div class="clearfix"></div>
                                                        <input type="text" class="form-control edit-word-limit"
                                                            id="referral_popup" placeholder="Referral Button Text"
                                                            name="referral_program_button_text" maxlength="30"
                                                            value="{{ $ebillStructure->referral_program_button_text }}">
                                                        <!-- <img id="referral_pencil" src="{{ asset('wh_lable/images/icon/pencil.png') }}"> -->
                                                        <span class="category-error p-error1"
                                                            id="referral_program_button_text_error"></span>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="referrel-custom">
                                                <div class="communication-sub">
                                                    <input type="radio" id="communication1" name="referral_type"
                                                        value="1"
                                                        @if ($ebillStructure->referral_type == 1) {{ 'checked' }} @endif>
                                                    <label for="communication1">Referral Mobile</label>
                                                </div>
                                                <div class="communication-sub">
                                                    <input type="radio" id="communication2" name="referral_type"
                                                        value="2"
                                                        @if ($ebillStructure->referral_type == 2) {{ 'checked' }} @endif>
                                                    <label for="communication2">Referral Code</label>
                                                </div>
                                                <span class="category-error p-error1"
                                                    id="referral_type_error"></span>

                                                <div class="clearfix"></div>
                                                <div class="col-md-3 no-padding">
                                                    <div class="custom-home1">
                                                        <select class="form-control"
                                                            style="border-radius: 4px;background: #f9f9f9;"
                                                            id="refferesmobilecode">
                                                            <option value="" selected="" hidden="">
                                                                Select Option</option>
                                                            <option value="##App Name##">App Name</option>
                                                            <option value="##Referrer's Mobile Number##">
                                                                Referrer's Mobile Number</option>
                                                            <option value="##Website Link##">Website Link</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <input
                                                    style="display: {{ $ebillStructure->referral_website_link ? 'block' : 'none' }};"
                                                    type="text" class="form-control all-enteradd clLink"
                                                    placeholder="Website Link" id="referral_website_link"
                                                    name="referral_website_link" maxlength="50"
                                                    value="{{ $ebillStructure->referral_website_link }}">
                                                <span class="category-error p-error1"
                                                    id="referral_website_link_error"></span>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="col-md-7 no-padding-left no-padding-right">
                                                <div class="custom-home referral-tooltip custom-home-profile"
                                                    title="This message will be sent to the referee when a customer tries to share their referral code from your customer app">
                                                    <!-- <div class="custom-home custom-home-profile"> -->
                                                    <input type="text" class="form-control edit-word-limit"
                                                        name="referralpopup" id="referral_popup_message"
                                                        placeholder="Write Your Referral Message Here... max 306 characters"
                                                        maxlength="306"
                                                        value="{{ $ebillStructure->referral_program_text }}"
                                                        style="border: 2px dashed #b9b9b9 !important;">
                                                    <!-- <textarea style="border: 2px dashed #b9b9b9 !important;resize: none;" maxlength="306"
                                                        class="form-control edit-word-limit" id="referral_popup"
                                                        placeholder="Write Your Referral Message Here... max 306 characters" name="referralpopup">{{ $ebillStructure->referral_message }}</textarea> -->
                                                    <!-- <img id="referral_popup_pencil" src="{{ asset('wh_lable/images/icon/pencil.png') }}"> -->
                                                    <span class="category-error p-error1"
                                                        id="referral_program_text_error"></span>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <!-- referral code end -->

                                    <div class="panel panel-default">
                                        <div class="panel-heading panel-heading-ebill" role="tab">
                                            <h4 class="panel-title">
                                                <div class="col-xs-4 no-padding">
                                                    <label class="pure-material-checkbox">
                                                        <input id="terms_and_condition_permission_id"
                                                            type="checkbox" name="terms_and_conditions_permission"
                                                            class="chk_priority" value="1"
                                                            {{ $ebillStructure->terms_and_conditions_permission == 1 ? 'checked' : '' }}>
                                                        <span>Terms & Conditions</span>
                                                    </label>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="col-md-offset-6 col-md-2">
                                                    <input type="text" id="terms_and_conditions_priority_id"
                                                        class="form-control all-enteradd cl_priority"
                                                        placeholder="Priority" name="terms_and_conditions_priority"
                                                        onkeypress="return isNumberKey(event);" maxlength="2"
                                                        value="{{ $ebillStructure->terms_and_conditions_priority }}">
                                                    <span class="category-error p-error1"
                                                        id="terms_and_conditions_priorityerror"></span>
                                                </div>
                                                <div class="clearfix"></div>
                                            </h4>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div id="collapseOne"
                                            class="terms_details_collapse panel-collapse collapse in">
                                            <div class="panel-body panel-body-terms-conditions">
                                                <div class="panel-ebill">
                                                    <div class="row">
                                                        <div class="ebill-sub-panel">
                                                            <div class="col-md-4">
                                                                <div class="col-md-10 no-padding-left">
                                                                    <label class="pure-material-checkbox">
                                                                        <input id="t_and_c1_permission_id"
                                                                            type="checkbox"
                                                                            name="t_and_c1_permission"
                                                                            class="all-enteradd" value="1"
                                                                            {{ $ebillStructure->t_and_c1_permission == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <div class="ebill-sub-custom">
                                                                        <textarea class="form-control set-custom-pre" id="txtArea1" name="t_and_c1" placeholder="T&C1" rows="4"
                                                                            cols="50"> {{ $ebillStructure->t_and_c1 }}</textarea>
                                                                        <span
                                                                            class="category-error p-error1 p-sub-error"
                                                                            id="t_and_c1_error"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 ebill-set no-padding">
                                                                    <input type="text" placeholder="Priority"
                                                                        id="t_and_c1_priority_id"
                                                                        class="form-control all-enteradd"
                                                                        name="t_and_c1_priority"
                                                                        onkeypress="return isNumberKey(event);"
                                                                        maxlength="1"
                                                                        value="{{ $ebillStructure->t_and_c1_priority }}">
                                                                    <span id="t_and_c1_priorityerror"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="col-md-10 no-padding-left">
                                                                    <label class="pure-material-checkbox">
                                                                        <input id="t_and_c2_permission_id"
                                                                            class="all-enteradd" type="checkbox"
                                                                            name="t_and_c2_permission"
                                                                            value="1"
                                                                            {{ $ebillStructure->t_and_c2_permission == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <div class="ebill-sub-custom">
                                                                        <textarea class="form-control" name="t_and_c2" placeholder="T&C2" rows="4" cols="50"
                                                                            id="txtArea2">{{ $ebillStructure->t_and_c2 }}</textarea>
                                                                        <span
                                                                            class="category-error p-error1 p-sub-error"
                                                                            id="t_and_c2_error"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 ebill-set no-padding">
                                                                    <input type="text" placeholder="Priority"
                                                                        id="t_and_c2_priority_id"
                                                                        class="form-control all-enteradd"
                                                                        name="t_and_c2_priority"
                                                                        onkeypress="return isNumberKey(event);"
                                                                        maxlength="1"
                                                                        value="{{ $ebillStructure->t_and_c2_priority }}">
                                                                    <span id="t_and_c2_priorityerror"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="col-md-10 no-padding-left">
                                                                    <label class="pure-material-checkbox">
                                                                        <input id="t_and_c3_permission_id"
                                                                            type="checkbox"
                                                                            name="t_and_c3_permission"
                                                                            class="all-enteradd" value="1"
                                                                            {{ $ebillStructure->t_and_c3_permission == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <div class="ebill-sub-custom">
                                                                        <textarea class="form-control" name="t_and_c3" placeholder="T&C3" rows="4" cols="50"
                                                                            id="txtArea3">{{ $ebillStructure->t_and_c3 }}</textarea>
                                                                        <span
                                                                            class="category-error p-error1 p-sub-error"
                                                                            id="t_and_c3_error"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 ebill-set no-padding">
                                                                    <input type="text" placeholder="priority"
                                                                        id="t_and_c3_priority_id"
                                                                        class="form-control all-enteradd"
                                                                        name="t_and_c3_priority"
                                                                        onkeypress="return isNumberKey(event);"
                                                                        maxlength="1"
                                                                        value="{{ $ebillStructure->t_and_c3_priority }}">
                                                                    <span id="t_and_c3_priorityerror"></span>
                                                                </div>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div class="ebill-sub-panel">
                                                            <div class="col-md-4">
                                                                <div class="col-md-10 no-padding-left">
                                                                    <label class="pure-material-checkbox">
                                                                        <input id="t_and_c4_permission_id"
                                                                            type="checkbox" class="all-enteradd"
                                                                            name="t_and_c4_permission"
                                                                            value="1"
                                                                            {{ $ebillStructure->t_and_c4_permission == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <div class="ebill-sub-custom">
                                                                        <textarea class="form-control" name="t_and_c4" placeholder="T&C4" rows="4" cols="50"
                                                                            id="txtArea4">{{ $ebillStructure->t_and_c4 }}</textarea>
                                                                        <span
                                                                            class="category-error p-error1 p-sub-error"
                                                                            id="t_and_c4_error"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 ebill-set no-padding">
                                                                    <input type="text" placeholder="Priority"
                                                                        id="t_and_c4_priority_id"
                                                                        class="form-control all-enteradd"
                                                                        name="t_and_c4_priority"
                                                                        onkeypress="return isNumberKey(event);"
                                                                        maxlength="1"
                                                                        value="{{ $ebillStructure->t_and_c4_priority }}">
                                                                    <span id="t_and_c4_priorityerror"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="col-md-10 no-padding-left">
                                                                    <label class="pure-material-checkbox">
                                                                        <input id="t_and_c5_permission_id"
                                                                            class="all-enteradd" type="checkbox"
                                                                            value="1"name="t_and_c5_permission"
                                                                            value="1"
                                                                            {{ $ebillStructure->t_and_c5_permission == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <div class="ebill-sub-custom">
                                                                        <textarea class="form-control" name="t_and_c5" placeholder="T&C5" rows="4" cols="50"
                                                                            id="txtArea5">{{ $ebillStructure->t_and_c5 }}</textarea>
                                                                        <span
                                                                            class="category-error p-error1 p-sub-error"
                                                                            id="t_and_c5_error"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 ebill-set no-padding">
                                                                    <input type="text" placeholder="Priority"
                                                                        id="t_and_c5_priority_id"
                                                                        class="form-control all-enteradd"
                                                                        name="t_and_c5_priority"
                                                                        onkeypress="return isNumberKey(event);"
                                                                        maxlength="1"
                                                                        value="{{ $ebillStructure->t_and_c5_priority }}">
                                                                    <span id="t_and_c5_priorityerror"></span>
                                                                </div>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-default">
                                        <div class="panel-heading panel-heading-ebill" role="tab">
                                            <h4 class="panel-title">
                                                <div class="col-xs-4 no-padding">
                                                    <label class="pure-material-checkbox">
                                                        <input id="footnote_permission_id"
                                                            class="all-enteradd chk_priority" type="checkbox"
                                                            name="footnote_permission" value="1"
                                                            {{ $ebillStructure->footnote_permission == 1 ? 'checked' : '' }}>
                                                        <span>Footnote</span>
                                                    </label>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="col-md-offset-6 col-md-2">
                                                    <!-- <input type="text" id="footnote_priority_id" class="form-control all-enteradd cl_priority" placeholder="Priority" name="footnote_priority" onkeypress="return isNumberKey(event);" maxlength="2" value="{{ $ebillStructure->footnote_priority }}">
             <span id="footnote_priorityerror"></span> -->
                                                </div>
                                                <div class="clearfix"></div>
                                            </h4>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div id="collapseOne"
                                            class="footnote_details_collapse panel-collapse collapse in">
                                            <div class="panel-body">
                                                <div class="panel-ebill">
                                                    <div class="row">
                                                        <div class="ebill-sub-panel">
                                                            <div class="col-md-6">
                                                                <textarea class="form-control" placeholder="Thank you visit again." name="footnote" maxlength="200">{{ $ebillStructure->footnote }}</textarea>
                                                                <span class="category-error p-error1"
                                                                    id="footnote_error"></span>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- //bb -->
                                    @if ($merchant->ebill_version == 2)
                                        <div class="panel panel-default">
                                            <div class="panel-heading panel-heading-ebill" role="tab">
                                                <h4 class="panel-title">
                                                    <div class="col-xs-4 no-padding">
                                                        <label class="pure-material-checkbox">
                                                            <input id="social_link_permission_id"
                                                                class="all-enteradd" type="checkbox"
                                                                name="social_link_permission" value="1"
                                                                {{ $ebillStructure->social_link_permission == 1 ? 'checked' : '' }}>
                                                            <span>Social Link</span>
                                                        </label>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div class="col-md-offset-6 col-md-2">
                                                        <input type="text" id="social_link_priority"
                                                            class="form-control all-enteradd cl_priority"
                                                            placeholder="Priority" name="social_link_priority"
                                                            onkeypress="return isNumberKey(event);" maxlength="2"
                                                            value="{{ $ebillStructure->social_link_priority }}">
                                                        <span id="social_link_priorityerror"></span>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </h4>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div id="collapseOne"
                                                class="social_link_details_collapse panel-collapse collapse in">
                                                <div class="panel-body panel-body-social_link">
                                                    <div class="panel-ebill">
                                                        <div class="row">
                                                            <div class="ebill-sub-panel">
                                                                <div class="col-md-3">
                                                                    <label class="social_link_header"
                                                                        style="width:45% !important">Social Link
                                                                        Header</label>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Enter Social Link Header"
                                                                        name="social_link_header"
                                                                        id="social_link_header" maxlength="55"
                                                                        value="{{ $ebillStructure->social_link_header }}" />
                                                                    <span class="category-error p-error1"
                                                                        id="social_link_header_error"></span>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </div>

                                                            <div class="ebill-sub-panel">
                                                                <div class="col-md-3">
                                                                    <label>Facebook</label>
                                                                    <input type="url" class="form-control"
                                                                        placeholder="Enter Facebook link here"
                                                                        name="facebook_link" id="link_Facebook"
                                                                        maxlength="55"
                                                                        value="{{ $ebillStructure->facebook_link }}"
                                                                        onkeyup="validateInput(this)" />
                                                                    <span class="category-error p-error1"
                                                                        id="link_Facebook_error"></span>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label>Twitter</label>
                                                                    <input type="url" class="form-control"
                                                                        placeholder="Enter Twitter link here"
                                                                        name="twitter_link" id="link_Twitter"
                                                                        maxlength="55"
                                                                        value="{{ $ebillStructure->twitter_link }}"
                                                                        onkeyup="validateInput(this)" />
                                                                    <span class="category-error p-error1"
                                                                        id="link_Twitter_error"></span>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label>Instagram</label>
                                                                    <input type="url" class="form-control"
                                                                        placeholder="Enter Instagram link here"
                                                                        name="instagram_link" id="link_Instagram"
                                                                        maxlength="55"
                                                                        value="{{ $ebillStructure->instagram_link }}"
                                                                        onkeyup="validateInput(this)" />
                                                                    <span class="category-error p-error1"
                                                                        id="link_Instagram_error"></span>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label>Youtube</label>
                                                                    <input type="url" class="form-control"
                                                                        placeholder="Enter Youtube link here"
                                                                        name="youtube_link" id="link_Youtube"
                                                                        maxlength="55"
                                                                        value="{{ $ebillStructure->youtube_link }}"
                                                                        onkeyup="validateInput(this)" />
                                                                    <span class="category-error p-error1"
                                                                        id="link_Youtube_error"></span>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                            <div
                                                                class="ebill-sub-panel ebill-sub-wt txtCountryCode_custom">
                                                                <input type="hidden" class="form-control"
                                                                    placeholder="Country code" name="country_code"
                                                                    id="txtCountryCode"
                                                                    value="{{ $ebillStructure->country_code }}" />
                                                                <!-- <span class="category-error p-error1" id="link_country_code"></span>
                <span id="lblError" class="error set-erroe-custom" style="visibility: visible;"></span> -->
                                                                <div class="col-md-3">
                                                                    <label>WhatsApp Business Number</label>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="WhatsApp Business Number"
                                                                        name="whatsapp_number" id="txtMobileNumber"
                                                                        maxlength="18" pattern="[0-9]+"
                                                                        value="{{ $ebillStructure->whatsapp_number }}" />
                                                                    <span class="category-error p-error1"
                                                                        id="link_WhatsApp_error"></span>
                                                                    <!-- <span id="lblError" class="error set-erroe-custom" style="visibility: visible;"></span> -->
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label>Customer Care Mobile</label>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Customer Care Mobile"
                                                                        name="customer_care_mobile"
                                                                        id="customer_care_mobile" maxlength="18"
                                                                        pattern="[0-9]+"
                                                                        value="{{ $ebillStructure->customer_care_mobile }}" />
                                                                    <span class="category-error p-error1"
                                                                        id="customer_care_mobile_error"></span>
                                                                    <!-- <span id="lblError" class="error set-erroe-custom" style="visibility: visible;"></span> -->
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label>Customer Care Email</label>
                                                                    <input type="email" class="form-control"
                                                                        placeholder="Customer Care Email"
                                                                        name="customer_care_email"
                                                                        id="customer_care_email"
                                                                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                                                                        onkeyup="validateInputEmail(this)"
                                                                        value="{{ $ebillStructure->customer_care_email }}" />
                                                                    <span class="category-error p-error1"
                                                                        id="customer_care_email_error"></span>
                                                                    <!-- <span id="lblError" class="error set-erroe-custom" style="visibility: visible;"></span> -->
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label>Brand Website link</label>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Brand Website link"
                                                                        name="brand_website_link"
                                                                        id="brand_website_link" maxlength="55"
                                                                        value="{{ $ebillStructure->brand_website_link }}"
                                                                        onkeyup="validateInput(this)" />
                                                                    <span class="category-error p-error1"
                                                                        id="brand_website_link_error"></span>
                                                                    <!-- <span id="lblError" class="error set-erroe-custom" style="visibility: visible;"></span> -->
                                                                </div>
                                                                <div class="clearfix"></div>
                                                                <span class="wh-text-set"><i class="fa fa-info dot"
                                                                        data-html="true" data-toggle="tooltip"
                                                                        data-container="body" data-placement="top"
                                                                        title="Add Whatsapp Business Number with Country Code(+91983xxxxxxx)"></i>Add
                                                                    Whatsapp Business Number with Country
                                                                    Code(+91983xxxxxxx)</span>
                                                            </div>

                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    <!-- MP-21.04.2023 -->
                                    <!-- <div class="panel panel-default" {{ $merchant->feedback_permission == 1 && $outlet->feedback_button_permission == 1 ? '' : 'style=display:none;' }}> -->
                                    @if ($merchant->ebill_version == 1)
                                        <div class="panel panel-default"
                                            {{ $merchant->feedback_permission == 1 ? '' : 'style=display:none;' }}>
                                            <div class="panel-heading panel-heading-ebill" role="tab">
                                                <h4 class="panel-title">
                                                    <div class="col-xs-4 no-padding">
                                                        <label class="pure-material-checkbox">
                                                            <input id="link_feedback_permission_id"
                                                                class="all-enteradd" type="checkbox"
                                                                name="link_feedback_permission" value="1"
                                                                {{ $ebillStructure->link_feedback_permission == 1 ? 'checked' : '' }}>
                                                            <span>Link Feedback</span>
                                                        </label>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </h4>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div id="collapseOne"
                                                class="link_feedback_details_collapse panel-collapse collapse in">
                                                <div class="panel-body">
                                                    <div class="panel-ebill">
                                                        <div class="row">
                                                            <div class="ebill-sub-panel">
                                                                <div class="col-md-6">
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Add Feedback Dynamic Text"
                                                                        name="link_feedback" id="link_feedback"
                                                                        maxlength="55"
                                                                        value="{{ $ebillStructure->feedback_dynamic_text }}" />
                                                                    <span class="category-error p-error1"
                                                                        id="link_feedback_error"></span>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <select class="form-control all-enteradd"
                                                                        id="link_feedback_form"
                                                                        name="link_feedback_form"
                                                                        placeholder="Select Form">
                                                                        <option value="">Select feedback form
                                                                        </option>
                                                                        @foreach ($formlist as $getform)
                                                                            <option value="{{ $getform->id }}"
                                                                                {{ $getform->id == $ebillStructure->feedback_form_id ? 'selected' : '' }}>
                                                                                {{ $getform->form_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <span class="category-error p-error1"
                                                                        id="link_feedback_form_error"></span>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="panel panel-default"
                                            {{ $merchant->feedback_permission == 1 ? '' : 'style=display:none;' }}>
                                            <div class="panel-heading panel-heading-ebill" role="tab">
                                                <h4 class="panel-title">
                                                    <div class="col-xs-4 no-padding">
                                                        <label class="pure-material-checkbox">
                                                            <input id="link_feedback_permission_id"
                                                                class="all-enteradd" type="checkbox"
                                                                name="link_feedback_permission" value="1"
                                                                {{ $ebillStructure->link_feedback_permission == 1 ? 'checked' : '' }}>
                                                            <span>Link Feedback</span>
                                                        </label>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <!-- <div class="col-md-offset-6 col-md-2">
             <select class="form-control all-enteradd" id="link_feedback_posisson_id"  name="link_feedback_posisson" placeholder="Select posission">
              <option value="">Select Display Position</option>
              <option value="1" {{ $ebillStructure->feedback_priority == 1 ? 'selected' : '' }}>Top</option>
              <option  value="2"  {{ $ebillStructure->feedback_priority == 2 ? 'selected' : '' }}>Bottom</option>
             </select>
             <span class="category-error p-error1" id="link_feedback_posissionerror"></span>
            </div> -->
                                                    <div class="clearfix"></div>
                                                </h4>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div id="collapseOne"
                                                class="link_feedback_details_collapse panel-collapse collapse in">
                                                <div class="panel-body">
                                                    <div class="panel-ebill">
                                                        <div class="row">
                                                            <div class="ebill-sub-panel">
                                                                <div class="col-md-4">
                                                                    <label class="pure-material-checkbox">
                                                                        <input id="feedback_heading_text_permission"
                                                                            class="all-enteradd" type="checkbox"
                                                                            value="1"name="feedback_heading_text_permission"
                                                                            value="1"
                                                                            {{ $ebillStructure->feedback_heading_text_permission == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <div class="ebill-sub-custom">
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Add Feedback Heading Text"
                                                                            name="feedback_heading_text"
                                                                            id="feedback_heading_text"
                                                                            maxlength="60"
                                                                            value="{{ $ebillStructure->feedback_heading_text }}" />
                                                                        <span class="category-error p-error1"
                                                                            id="feedback_heading_text_error"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label class="pure-material-checkbox">
                                                                        <input
                                                                            id="feedback_subheading_text_permission"
                                                                            class="all-enteradd" type="checkbox"
                                                                            value="1"name="feedback_subheading_text_permission"
                                                                            value="1"
                                                                            {{ $ebillStructure->feedback_subheading_text_permission == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <div class="ebill-sub-custom">
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Add Feedback Subheading Text"
                                                                            name="feedback_subheading_text"
                                                                            id="feedback_subheading_text"
                                                                            maxlength="255"
                                                                            value="{{ $ebillStructure->feedback_subheading_text }}" />
                                                                        <span class="category-error p-error1"
                                                                            id="feedback_subheading_text_error"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label class="pure-material-checkbox">
                                                                        <input id="feedback_dynamic_text_permission"
                                                                            class="all-enteradd" type="checkbox"
                                                                            value="1"name="feedback_dynamic_text_permission"
                                                                            value="1"
                                                                            {{ $ebillStructure->feedback_dynamic_text_permission == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                    <div class="ebill-sub-custom">
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Add Feedback Dynamic Text"
                                                                            name="link_feedback" id="link_feedback"
                                                                            maxlength="55"
                                                                            value="{{ $ebillStructure->feedback_dynamic_text }}" />
                                                                        <span class="category-error p-error1"
                                                                            id="link_feedback_error"></span>
                                                                    </div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-ebill">
                                                        <div class="row">
                                                            <div class="ebill-sub-panel">
                                                                <div class="col-md-4">
                                                                    <label class="pure-material-checkbox">
                                                                    </label>
                                                                    <select class="form-control all-enteradd"
                                                                        id="link_feedback_form"
                                                                        name="link_feedback_form"
                                                                        placeholder="Select Form">
                                                                        <option value="">Select feedback form
                                                                        </option>
                                                                        @foreach ($formlist as $getform)
                                                                            <option value="{{ $getform->id }}"
                                                                                {{ $getform->id == $ebillStructure->feedback_form_id ? 'selected' : '' }}>
                                                                                {{ $getform->form_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <span class="category-error p-error1"
                                                                        id="link_feedback_form_error"></span>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <!-- ----MP---- -->

                                    <div class="panel panel-default">
                                        <div class="panel-heading panel-heading-ebill" role="tab">
                                            <h4 class="panel-title">
                                                <div class="col-xs-4 no-padding">
                                                    <label class="pure-material-checkbox">
                                                        <input id="banner_permission_id" class="all-enteradd"
                                                            type="checkbox" name="banner_permission"
                                                            value="1"
                                                            {{ $ebillStructure->banner_permission == 1 ? 'checked' : '' }}>
                                                        <span>Fixed Display Banners</span>
                                                    </label>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="col-md-offset-6 col-md-2">
                                                    <input type="hidden" name="banner_priority" value="1">
                                                    <select class="form-control all-enteradd" id="bannerpriority_id"
                                                        name="banner_priority" placeholder="Select Priority">
                                                        <option value="">Select Display Position</option>
                                                        <option
                                                            {{ $ebillStructure->banner_priority == 1 ? 'selected' : '' }}
                                                            value="1">Top</option>
                                                        <option value="2"
                                                            {{ $ebillStructure->banner_priority == 2 ? 'selected' : '' }}>
                                                            Bottom</option>
                                                        @if ($merchant->ebill_version == 2)
                                                            <option value="3"
                                                                {{ $ebillStructure->banner_priority == 3 ? 'selected' : '' }}>
                                                                Middle</option>
                                                        @endif
                                                    </select>
                                                    <span id="banner_priorityerror"></span>
                                                </div>
                                                <div class="clearfix"></div>


                                                <div class="clearfix"></div>
                                            </h4>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div id="collapseOne"
                                            class="banner_details_collapse panel-collapse collapsest inst">
                                            <div class="panel-body">
                                                <div class="panel-ebill">
                                                    <div class="home-table">
                                                        <a class="new-outlet-banner new-outlet" id="add_bill_banner"
                                                            href="javascript:void(0)">Add</a>
                                                        <span class="category-error"
                                                            id="banner_permissionerror"></span>
                                                        <div class="clearfix"></div>
                                                        <table id="banner_table_id"
                                                            class="table table-striped table-bordered"
                                                            style="width: 100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th>Image</th>
                                                                    <th>Priority</th>
                                                                    <th>Links</th>
                                                                    <th>Status</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- //bb -->
                                    @if ($merchant->ebill_version == 2)
                                        <div class="panel panel-default">
                                            <div class="panel-heading panel-heading-ebill" role="tab">
                                                <h4 class="panel-title">
                                                    <div class="col-xs-4 no-padding">
                                                        <label class="pure-material-checkbox">
                                                            <input id="Dynamic_banner_permission_id"
                                                                class="all-enteradd" type="checkbox"
                                                                name="dynamic_banner_permission" value="1"
                                                                {{ $ebillStructure->dynamic_banner_permission == 1 ? 'checked' : '' }}>
                                                            <span>Dynamic Banner - Priority Wise</span>
                                                        </label>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="clearfix"></div>
                                                </h4>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="">
                                                <div id="collapseOne"
                                                    class="Dynamic_banner_details_collapse panel-collapse collapsest inst">
                                                    <div id = "dynamic_banner_popup"></div>
                                                    <div id="banner_type_main">
                                                        @if (count($add_dynamic_banner) > 0)
                                                            <?php
                                                            $i = 1;
                                                            ?>
                                                            @foreach ($add_dynamic_banner as $tile)
                                                                <div class="panel-body_remove">
                                                                    <div class="panel-body">
                                                                        <div class="panel-ebill">
                                                                            <label class="pure-material-checkbox">
                                                                                <input
                                                                                    id="banner_Image_tile{{ $i }}_id"
                                                                                    class="all-enteradd clchkprmsn"
                                                                                    data-id="{{ $tile->id }}"
                                                                                    type="checkbox"
                                                                                    name="dynamic_banner_tile{{ $i }}_permission"
                                                                                    value="1"
                                                                                    {{ $tile->tile_permission == 1 ? 'checked' : '' }}>
                                                                                <span>Banner Image</span>
                                                                            </label>
                                                                            <span class="category-error dyenerr"
                                                                                id="dynamic_banner_permissionerror"></span>
                                                                            <div class="button-container">
                                                                                <button class="remove-table-btn"
                                                                                    id="remove_table_btn_id"
                                                                                    data-id="{{ $tile->id }}">X</button>
                                                                            </div>
                                                                            <div id="collapseOne{{ $i }}"
                                                                                class="banner_image_details_collapse panel-collapse collapsest01 inst">
                                                                                <div class="home-table">
                                                                                    <a class="new-outlet-banner new-outlet clbnrimg"
                                                                                        id="dynamic_bill_banner"
                                                                                        href="javascript:void(0)"
                                                                                        data-id="{{ $tile->id }}">Add</a>

                                                                                    <div
                                                                                        class="col-md-offset-6 col-md-3">
                                                                                        @if ($tile->banner_layout == 2 || $tile->banner_layout == 1)
                                                                                            <input type="text"
                                                                                                id="dynamic_banner_layout"
                                                                                                class="form-control all-enteradd"
                                                                                                placeholder="Banner Layout"
                                                                                                name="dynamic_banner_layout"
                                                                                                value="{{ $tile->banner_layout == 2 ? 'Double Banner-single Tile' : ($tile->banner_layout == 1 ? 'Single Banner- single Tile' : '') }}"
                                                                                                style="float: right;"
                                                                                                disabled>
                                                                                        @else
                                                                                            <input type="text"
                                                                                                id="dynamic_banner_layout"
                                                                                                class="form-control all-enteradd none"
                                                                                                placeholder="Banner Layout"
                                                                                                name="dynamic_banner_layout"
                                                                                                value=""
                                                                                                style="float: right;"
                                                                                                disabled>
                                                                                        @endif
                                                                                    </div>

                                                                                    <div class="col-md-2"
                                                                                        style="float: right;">
                                                                                        <input type="hidden"
                                                                                            name="totalVarNameb[]"
                                                                                            value="1">
                                                                                        <input type="hidden"
                                                                                            name="rmvbnr[]"
                                                                                            class="clrmvbnr"
                                                                                            value="0">
                                                                                        <input type="hidden"
                                                                                            name="dynamic_banner_tile_id[]"
                                                                                            value="{{ $tile->id }}">
                                                                                        <input type="hidden"
                                                                                            class="clTlPrmsn"
                                                                                            id="dynamic_banner_tile_id_{{ $tile->id }}"
                                                                                            name="dynamic_banner_tile_id_{{ $tile->id }}"
                                                                                            value="{{ $tile->tile_permission }}">
                                                                                        <input type="text"
                                                                                            id="dynamic_bill_banner_id{{ $i }}"
                                                                                            class="form-control all-enteradd cl_priority"
                                                                                            placeholder="Priority"
                                                                                            name="dynamic_banner_tile[]"
                                                                                            onkeypress="return isNumberKey(event);"
                                                                                            maxlength="2"
                                                                                            value="{{ $tile->priority }}">
                                                                                        <span
                                                                                            id="dynamic_banner_tile{{ $i }}_priorityerror"></span>
                                                                                    </div>
                                                                                    <!-- <span class="category-error" id="dynamic_banner_permissionerror"></span> -->
                                                                                    <div class="clearfix"></div>
                                                                                    <table
                                                                                        id="dynamic_banner_table_id"
                                                                                        class="table table-striped table-bordered bnrtbl dttbl_{{ $tile->id }}"
                                                                                        style="width: 100%;">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th>Image</th>
                                                                                                <th>Image Linking URL
                                                                                                </th>
                                                                                                <th>Tag Text</th>
                                                                                                <th>Tag Linking URL</th>
                                                                                                <th>Priority</th>
                                                                                                <th>Action</th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            @foreach ($tile->banner_list as $data)
                                                                                                <tr
                                                                                                    id="tr_{{ $data->id }}">
                                                                                                    <td><img class="cl_bnr_img"
                                                                                                            src="{{ $data->banner_image }}"
                                                                                                            width="100px;">
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="cl_bnr_lnk">
                                                                                                        {{ $data->banner_link }}
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="cl_bnr_tag_txt">
                                                                                                        {{ $data->banner_tag_text }}
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="cl_bnr_tag_lnk_url">
                                                                                                        {{ $data->banner_tag_linking_url }}
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="cl_bnr_property">
                                                                                                        {{ $data->banner_priority }}
                                                                                                    </td>
                                                                                                    <td><a class="editdynbanner"
                                                                                                            id="dynamic_bill_banner_edit"
                                                                                                            href="javascript:void(0)"
                                                                                                            onclick ="fnEdit({{ $data->id }},{{ $tile->banner_layout }})">Edit</a>
                                                                                                        | <a class="deletedynbanner"
                                                                                                            id="dynamic_bill_banner_delete"
                                                                                                            style="color: red !important;"
                                                                                                            href="javascript:void(0)"
                                                                                                            onclick ="fnDelete({{ $data->id }})">Delete</a>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            @endforeach
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                                $i++;
                                                                ?>
                                                            @endforeach
                                                        @else
                                                            <div class="panel-body_remove">
                                                                <div class="panel-body">
                                                                    <div class="panel-ebill">
                                                                        <label class="pure-material-checkbox">
                                                                            <input id="banner_Image_tile1_id"
                                                                                class="all-enteradd clchkprmsn"
                                                                                data-id="0" type="checkbox"
                                                                                name="dynamic_banner_tile1_permission"
                                                                                value="1">
                                                                            <span>Banner Image</span>
                                                                        </label>
                                                                        <span class="category-error dyenerr"
                                                                            id="dynamic_banner_permissionerror"></span>
                                                                        <div class="button-container">
                                                                            <button class="remove-table-btn"
                                                                                id="remove_table_btn_id">X</button>
                                                                        </div>
                                                                        <div id="collapseOne1"
                                                                            class="banner_image_details_collapse panel-collapse collapsest">
                                                                            <div class="home-table">
                                                                                <a class="new-outlet-banner new-outlet clbnrimg"
                                                                                    id="dynamic_bill_banner"
                                                                                    href="javascript:void(0)">Add</a>
                                                                                <!-- <div class="col-md-2">
                   <select class="form-control all-enteradd" id="banner_tile1"  name="banner_tile1" placeholder="Select Banner Tile" style="float: right;">
                    <option value="">Select Banner Tile</option>
                    <option value="2">Banner Tile 1</option>
                    <option value="3">Banner Tile 2</option>
                    <option value="4">Banner Tile 3</option>
                   </select>
                   <span id="dynamic_banner_tile1_error"></span>
                  </div> -->

                                                                                <div class="col-md-offset-6 col-md-3">
                                                                                    <input type="text"
                                                                                        id="dynamic_banner_layout"
                                                                                        class="form-control all-enteradd none"
                                                                                        placeholder="Banner Layout"
                                                                                        name="dynamic_banner_layout"
                                                                                        value=""
                                                                                        style="float: right;"
                                                                                        disabled>
                                                                                </div>

                                                                                <div class="col-md-2"
                                                                                    style="float: right;">
                                                                                    <input type="hidden"
                                                                                        name="totalVarNameb[]"
                                                                                        value="1">
                                                                                    <input type="hidden"
                                                                                        name="rmvbnr[]"
                                                                                        class="clrmvbnr"
                                                                                        value="0">
                                                                                    <input type="hidden"
                                                                                        name="dynamic_banner_tile_id[]"
                                                                                        value="">
                                                                                    <input type="text"
                                                                                        id="dynamic_bill_banner_id1"
                                                                                        class="form-control all-enteradd cl_priority"
                                                                                        placeholder="Priority"
                                                                                        name="dynamic_banner_tile[]"
                                                                                        onkeypress="return isNumberKey(event);"
                                                                                        maxlength="2"
                                                                                        value="{{ $ebillStructure->dynamic_banner_tile1_priority }}">
                                                                                    <span
                                                                                        id="dynamic_banner_tile1_priorityerror"></span>
                                                                                </div>
                                                                                <div class="clearfix"></div>
                                                                                <table id="dynamic_banner_table_id"
                                                                                    class="table table-striped table-bordered bnrtbl"
                                                                                    style="width: 100%;">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>Image</th>
                                                                                            <th>Image Linking URL</th>
                                                                                            <th>Tag Text</th>
                                                                                            <th>Tag Linking URL</th>
                                                                                            <th>Priority</th>
                                                                                            <th>Action</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>

                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="add-append-text col-md-12">
                                                        @if (count($add_dynamic_banner) < 3)
                                                            <a id="add_another_banner" class="add-anothet-var"
                                                                href="javascript:void(0)">Add Another Banner</a><br>
                                                        @else
                                                            <a id="add_another_banner" class="add-anothet-var"
                                                                href="javascript:void(0)" disabled="disabled">Add
                                                                Another Banner</a><br>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>

                                        <div class="clearfix"></div>
                                </div>
                                @endif





                                <div class="modal fade modal-ebill-account" id="myModal_outlets" role="dialog">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close"
                                                    data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Select Outlet(s)</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="pos-filter-check chat-scroll">
                                                    <div class="pure-select">
                                                        <label class="pure-material-checkbox">
                                                            <input type="checkbox" id="select_all" name="">
                                                            <span></span>
                                                        </label>
                                                        <h6>All</h6>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div class="clearfix"></div>

                                                    @foreach ($outletlist as $getoutletlist)
                                                        <div class="pure-select">
                                                            <label
                                                                class="pure-material-checkbox {{ $ebillStructure->outlet_id == $getoutletlist->id ? 'selected_class' : '' }}">
                                                                <input type="checkbox"
                                                                    class="{{ $ebillStructure->outlet_id == $getoutletlist->id ? '' : 'checkbox' }} all-enteradd "
                                                                    name="outlet_check[]"
                                                                    value="{{ $getoutletlist->id }}"
                                                                    {{ $ebillStructure->outlet_id == $getoutletlist->id ? 'checked readonly' : '' }}>
                                                                <span></span>
                                                            </label>
                                                            <h6>{{ $getoutletlist->outletname }}</h6>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <div class="pos-modal-footer">
                                                    <div class="clearfix"></div>
                                                    <button type="button" class="btn"
                                                        data-dismiss="modal">Cancel</button>
                                                    <button type="button" id="all_output_submit_id"
                                                        class="btn apply_filter">Apply</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if ($login_type == 1)
                                    <div class="footer-bottom">
                                        <button type="submit" id="ebill_structure_submit_id" class="btn">Save
                                            and Apply</button>
                                        <button class="btn" type="button" id="save_apply">Save and Apply to
                                            Multiple Outlets</button>
                                    </div>
                                @endif
                            </div>
                    </div>
                    </form>

                    <div class="modal fade" id="myModal_addbanner" role="dialog">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Add Banner Image</h4>
                                </div>
                                <form id="add_banner_form_id" enctype="multipart/form-data" autocomplete="off">
                                    <span class="category-error" id="add_banner_output_id"></span>
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        <div class="col-md-12 no-padding">
                                            <div class="main-upload">
                                                <div class="col-md-3">
                                                    <label class="newbtn">
                                                        <img id="blah_add_banneradd_set"
                                                            src="{{ asset('images/icon/Icons-01.png') }}">
                                                        <input id="
															" class="all-enteradd"
                                                            type="file" name="banner_image_set" required="">
                                                        <p id="addpushimage_set">Add Image*</p>
                                                    </label>
                                                    <h4 class="clearimage_set" style="display: none;">x</h4>
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="file-cont">
                                                        <p>Max size allowed: <span>50 KB</span></p>
                                                        <p>Accepted Format: <span>JPEG, PNG</span></p>
                                                        <p>Image Ratio: <span class="img_rto">4 : 3</span></p>
                                                        <p>Suggested Dimensions: <span>640x480</span></p>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                                <span class="category-error" id="addbannererror_modal"></span>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-12 add-outlet no-padding">
                                            <div class="sub-add-outlet">
                                                <div class="col-md-6">
                                                    <p>Priority*</p>
                                                    <input type="text" id="addbannpriority"
                                                        class="form-control all-enteradd" name="add_banner_priority"
                                                        onkeypress="return isNumberKey(event);" inputmode="numeric"
                                                        pattern="[0-9]*" maxlength="5" placeholder="Priority" />
                                                    <span class="rederror" id="addbannerpriorityerror"></span>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>Link</p>
                                                    <input type="text" id="banner_link_id"
                                                        class="form-control all-enteradd" placeholder="Your Link"
                                                        name="banner_link" maxlength="100">
                                                    <input type="hidden" name="id"
                                                        value="{{ $ebillStructure->id }}">
                                                    <input type="hidden" id="outlet_id"name="outletid"
                                                        value="{{ $outletid }}">
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="sub-add-outlet">
                                                <button id="add_banner_submit_id" type="submit">Add</button>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- //bb -->
                    <div class="modal fade" id="myModal_dynamicbanner" role="dialog">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Add Banner Image and Tag</h4>
                                </div>
                                <form id="dynamic_banner_form_id" enctype="multipart/form-data"
                                    autocomplete="off">
                                    <span class="category-error" id="add_dynamic_banner_output_id"></span>
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        <div class="col-md-12 no-padding">
                                            <div class="main-upload">
                                                <div class="col-md-3">
                                                    <label class="newbtn">
                                                        <img id="dynamic_add_banneradd_set"
                                                            src="{{ asset('images/icon/Icons-01.png') }}">
                                                        <input id="dynamic_imgInp_add_banneradd_set"
                                                            class="all-enteradd" type="file"
                                                            name="dynamic_banner_image_set" required="">
                                                        <p id="adddynamicimage_set">Add Image*</p>
                                                        <h5 class="dynamic_clearimage_set" style="display: none;">x
                                                        </h5>
                                                    </label>
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="file-cont">
                                                        <p>Max size allowed: <span>50 KB</span></p>
                                                        <p>Accepted Format: <span>JPEG, PNG</span></p>
                                                        <p>Image Ratio: <span class="img_dyn_bnr_rto">4 : 3</span></p>
                                                        <p>Suggested Dimensions: <span class="bnr_dia">640x480</span>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                                <span class="category-error"
                                                    id="dynamic_bannererror_modal_image"></span>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-12 add-outlet no-padding">
                                            <div class="sub-add-outlet">
                                                <div class="col-md-6">
                                                    <p>Priority*</p>
                                                    <input type="hidden" id="banner_tile" name="banner_tile">
                                                    <input type="hidden" id="dynamic_banner_permsn"
                                                        name="dynamic_banner_permsn">
                                                    <input type="hidden" id="banner_rmv_tile"
                                                        name="banner_rmv_tile" value="0">
                                                    <input type="hidden" id="tile_banner_layout"
                                                        name="tile_banner_layout">
                                                    <input type="text" id="dynamic_bannpriority"
                                                        class="form-control all-enteradd"
                                                        name="dynamic_banner_priority"
                                                        onkeypress="return isNumberKey(event);" inputmode="numeric"
                                                        pattern="[0-9]*" maxlength="5" placeholder="Priority" />
                                                    <span class="category-error"
                                                        id="adddynbannerpriorityerror"></span>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>URL for image</p>
                                                    <input type="text" id="dynamic_image_url_id"
                                                        class="form-control all-enteradd" placeholder="Image URL"
                                                        name="dynamic_image_url" maxlength="100">
                                                    <span class="category-error" id="adddynbnrimgurl"></span>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-6">
                                                    <p>Tag Text</p>
                                                    <input type="text" id="dynamic_tag_text_id"
                                                        class="form-control all-enteradd" placeholder="Tag Text"
                                                        name="dynamic_tag_text" maxlength="100">
                                                    <span class="category-error" id="adddynbnrtagtxt"></span>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>URL for tag</p>
                                                    <input type="text" id="dynamic_tag_url_id"
                                                        class="form-control all-enteradd" placeholder="Tag URL"
                                                        name="dynamic_tag_url" maxlength="100">
                                                    <input type="hidden" name="id"
                                                        value="{{ $ebillStructure->id }}">
                                                    <input type="hidden" id="outlet_id"name="outletid"
                                                        value="{{ $outletid }}">
                                                    <span class="category-error" id="adddynbnrtagurl"></span>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="sub-add-outlet">
                                                <button id="add_dynamic_banner_submit_id"
                                                    type="submit">Add</button>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- // bb modal2 -->
                    <!-- if($('input[name=dynamic_banner_tile2_permission]').is(":checked")){
 <div class="modal fade" id="myModal_dynamicbanner" role="dialog">
        <div class="modal-dialog modal-md">
         <div class="modal-content">
          <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal">&times;</button>
           <h4 class="modal-title">Add Banner Image and Tag</h4>
          </div>
          <form id="dynamic_banner_form_id"  enctype="multipart/form-data" autocomplete="off">
 <span class="category-error" id="add_dynamic_banner_output_id"></span>
 {{ csrf_field() }}
           <div class="modal-body">
            <div class="col-md-12 no-padding">
             <div class="main-upload">
              <div class="col-md-3">
               <label class="newbtn">
                <img id="dynamic_add_banneradd_set" src="{{ asset('images/icon/Icons-01.png') }}">
                <input id="dynamic_imgInp_add_banneradd_set" class="all-enteradd" type="file" name="dynamic_banner_image_set" required="">
                <p id="adddynamicimage_set">Banner Image*</p>
         </label>
         <h4 class="dynamic_clearimage_set" style="display: none;">x</h4>
              </div>
              <div class="col-md-7">
               <div class="file-cont">
                <p>Max size allowed: <span>50 KB</span></p>
                <p>Accepted Format: <span>JPEG, PNG</span></p>
                <p>Image Ratio: <span>4 : 3</span></p>
                <p>Suggested Dimensions: <span>640x480</span></p>
               </div>
              </div>
              <div class="clearfix"></div>
              <span class="category-error" id="dynamic_bannererror_modal_image"></span>
             </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12 add-outlet no-padding">
             <div class="sub-add-outlet">
              <div class="col-md-6">
               <p>Priority*</p>
               <input type="text" id="dynamic_bannpriority" class="form-control all-enteradd" name="dynamic_banner_priority"  onkeypress="return isNumberKey(event);" inputmode="numeric" pattern="[0-9]*" maxlength="5" placeholder="Priority" />
               <span class="rederror" id="addbannerpriorityerror"></span>
              </div>
              <div class="col-md-6">
               <p>URL for image</p>
               <input type="text" id="dynamic_image_url_id" class="form-control all-enteradd" placeholder="image link" name="dynamic_image_url" maxlength="100">
              </div>
              <div class="col-md-6">
               <p>Tag Text</p>
               <input type="text" id="dynamic_tag_text_id" class="form-control all-enteradd" placeholder="Tag Text" name="dynamic_tag_text" maxlength="100">
              </div>
              <div class="col-md-6">
               <p>URL for tag</p>
               <input type="text" id="dynamic_tag_url_id" class="form-control all-enteradd" placeholder="Tag URL" name="dynamic_tag_url" maxlength="100">
               <input type="hidden" name="id" value="{{ $ebillStructure->id }}">
               <input type="hidden" id="outlet_id"name="outletid" value="{{ $outletid }}">
              </div>
              <div class="clearfix"></div>
             </div>
             <div class="sub-add-outlet">
              <button id="add_dynamic_banner_submit_id" type="submit">Add</button>
             </div>
            </div>
            <div class="clearfix"></div>
           </div>
          </form>
         </div>
        </div>
       </div>
      } -->

                    <!-- //bb modal3 -->
                    <!-- if($('input[name=dynamic_banner_tile3_permission]').is(":checked")){
      <div class="modal fade" id="myModal_dynamicbanner" role="dialog">
       <div class="modal-dialog modal-md">
        <div class="modal-content">
         <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Banner Image and Tag</h4>
         </div>
         <form id="dynamic_banner_form_id"  enctype="multipart/form-data" autocomplete="off">
                                        <span class="category-error" id="add_dynamic_banner_output_id"></span>
                                              {{ csrf_field() }}
          <div class="modal-body">
           <div class="col-md-12 no-padding">
            <div class="main-upload">
             <div class="col-md-3">
              <label class="newbtn">
               <img id="dynamic_add_banneradd_set" src="{{ asset('images/icon/Icons-01.png') }}">
               <input id="dynamic_imgInp_add_banneradd_set" class="all-enteradd" type="file" name="dynamic_banner_image_set" required="">
               <p id="adddynamicimage_set">Banner Image*</p>
        </label>
        <h4 class="dynamic_clearimage_set" style="display: none;">x</h4>
             </div>
             <div class="col-md-7">
              <div class="file-cont">
               <p>Max size allowed: <span>50 KB</span></p>
               <p>Accepted Format: <span>JPEG, PNG</span></p>
               <p>Image Ratio: <span>4 : 3</span></p>
               <p>Suggested Dimensions: <span>640x480</span></p>
              </div>
             </div>
             <div class="clearfix"></div>
             <span class="category-error" id="dynamic_bannererror_modal_image"></span>
            </div>
           </div>
           <div class="clearfix"></div>
           <div class="col-md-12 add-outlet no-padding">
            <div class="sub-add-outlet">
             <div class="col-md-6">
              <p>Priority*</p>
              <input type="text" id="dynamic_bannpriority" class="form-control all-enteradd" name="dynamic_banner_priority"  onkeypress="return isNumberKey(event);" inputmode="numeric" pattern="[0-9]*" maxlength="5" placeholder="Priority" />
              <span class="rederror" id="addbannerpriorityerror"></span>
             </div>
             <div class="col-md-6">
              <p>URL for image</p>
              <input type="text" id="dynamic_image_url_id" class="form-control all-enteradd" placeholder="image link" name="dynamic_image_url" maxlength="100">
             </div>
             <div class="col-md-6">
              <p>Tag Text</p>
              <input type="text" id="dynamic_tag_text_id" class="form-control all-enteradd" placeholder="Tag Text" name="dynamic_tag_text" maxlength="100">
             </div>
             <div class="col-md-6">
              <p>URL for tag</p>
              <input type="text" id="dynamic_tag_url_id" class="form-control all-enteradd" placeholder="Tag URL" name="dynamic_tag_url" maxlength="100">
              <input type="hidden" name="id" value="{{ $ebillStructure->id }}">
              <input type="hidden" id="outlet_id"name="outletid" value="{{ $outletid }}">
             </div>
             <div class="clearfix"></div>
            </div>
            <div class="sub-add-outlet">
             <button id="add_dynamic_banner_submit_id" type="submit">Add</button>
            </div>
           </div>
           <div class="clearfix"></div>
          </div>
         </form>
        </div>
       </div>
      </div>
      } -->

                    <div class="modal fade" id="myModal_dynamicbanner_edit" role="dialog">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Edit Banner Image and Tag</h4>
                                </div>
                                <form id="dynamic_banner_form_id_edit" enctype="multipart/form-data"
                                    autocomplete="off">
                                    <span class="category-error" id="add_dynamic_banner_output_id"></span>
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        <div class="col-md-12 no-padding">
                                            <div class="main-upload">
                                                <div class="col-md-3">
                                                    <label class="newbtn">
                                                        <img id="dynamic_edit_banneradd_set"
                                                            src="{{ asset('images/icon/Icons-01.png') }}">
                                                        <input id="dynamic_imgInp_edit_banneradd_set"
                                                            class="all-enteradd" type="file"
                                                            name="dynamic_banner_image_set"
                                                            onchange="read_edit_banner_URLadd_set(this);"
                                                            required="">
                                                        <p id="editdynamicimage_set">Add Image*</p>
                                                        <h5 class="dynamic_clearimage_set" style="display: none;">x
                                                        </h5>
                                                    </label>
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="file-cont">
                                                        <p>Max size allowed: <span>50 KB</span></p>
                                                        <p>Accepted Format: <span>JPEG, PNG</span></p>
                                                        <p>Image Ratio: <span class="Edit_img_rto">4 : 3</span></p>
                                                        <p>Suggested Dimensions: <span
                                                                class="Edit_img_dmn">640x480</span></p>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                                <span class="category-error" id="addbannererror_modal_image"></span>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-12 add-outlet no-padding">
                                            <div class="sub-add-outlet">
                                                <div class="col-md-6">
                                                    <p>Priority*</p>
                                                    <input type="text" id="edit_dynamic_bannpriority"
                                                        class="form-control all-enteradd"
                                                        name="dynamic_banner_priority"
                                                        onkeypress="return isNumberKey(event);" inputmode="numeric"
                                                        pattern="[0-9]*" maxlength="5" placeholder="Priority" />
                                                    <span class="category-error"
                                                        id="editbannerpriorityerror"></span>
                                                    <!-- <input type="hidden" id="Edit_tile_banner_layout" name="tile_banner_layout"> -->
                                                </div>
                                                <div class="col-md-6">
                                                    <p>URL for image</p>
                                                    <input type="text" id="edit_dynamic_image_url_id"
                                                        class="form-control all-enteradd" placeholder="Image URL"
                                                        name="dynamic_image_url" maxlength="100">
                                                    <input type="hidden" name="id"
                                                        value="{{ $ebillStructure->id }}">
                                                    <input type="hidden" id="outlet_edit_id"name="outletid"
                                                        value="{{ $outletid }}">
                                                    <span class="category-error" id="editdynbnrimgurl"></span>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>Tag Text</p>
                                                    <input type="text" id="edit_dynamic_tag_text_id"
                                                        class="form-control all-enteradd" placeholder="Tag Text"
                                                        name="dynamic_tag_text" maxlength="100">
                                                    <!-- <input type="hidden" name="id" value="{{ $ebillStructure->id }}">
              <input type="hidden" id="outlet_id"name="outletid" value="{{ $outletid }}"> -->
                                                    <span class="category-error" id="editdynbnrtagtxt"></span>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>URL for tag</p>
                                                    <input type="text" id="edit_dynamic_tag_url_id"
                                                        class="form-control all-enteradd" placeholder="Tag URL"
                                                        name="dynamic_tag_url" maxlength="100">
                                                    <!-- <input type="hidden" name="id" value="{{ $ebillStructure->id }}">
              <input type="hidden" id="outlet_id"name="outletid" value="{{ $outletid }}"> -->
                                                    <span class="category-error" id="editdynbnrtagurl"></span>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="sub-add-outlet">
                                                <button id="edit_dynamic_banner_submit_id" type="submit"
                                                    class="btn">update</button>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade modal-ebill-account modal-multipleset" id="confirmmultiple_outlets"
                        role="dialog">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Confirm Changes</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Do you want to replicate all details except the Company Details section?</p>
                                    <div class="pos-modal-footer">
                                        <div class="clearfix"></div>
                                        <button type="button" class="btn companydetails_yes"
                                            data-accept_type="0">No</button>
                                        <button type="button" class="btn companydetails_yes"
                                            data-accept_type="1">Yes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection

<div class="modal fade" id="EditModalForAll" role="dialog">
<div class="modal-dialog modal-md" id="editdiv_all_id">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title modal-titleforEdit"></h4>
        </div>
        <div class="modal-body">
            <div class="contentforedit"></div>
        </div>
    </div>
</div>
</div>

@section('custom_script')
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('js/intlTelInput_text.js') }}"></script>
<script>
    /*******************************Referral Work*****************************************/
    var selectedvalue = "{{ $ebillStructure->referral_type }}";
    if (selectedvalue == 1) {
        $('#refferesmobilecode option').eq(2).text("Referrer's Mobile Number").val("##Referrer's Mobile Number##");
        $('#refferesmobilecode option').eq(3).text("Website Link").val("##Website Link##");
    }
    if (selectedvalue == 2) {
        $('#refferesmobilecode option').eq(2).text("Referrer's Code").val("##Referrer's Code##");
        $('#refferesmobilecode option').eq(3).text("Website Link").val("##Website Link##");
    }
    $('input[name=referral_type]').click(function() {
        var selectedradio = $(this).val();
        if (selectedradio == 1) {
            $('#refferesmobilecode option').eq(2).text("Referrer's Mobile Number").val(
                "##Referrer's Mobile Number##");
            var replit = $('#referral_popup_message').val().replace(/##Referrer's Code##/g,
                "##Referrer's Mobile Number##");
            $('#referral_popup_message').val(replit);

            $('#refferesmobilecode option').eq(3).text("Website Link").val("##Website Link##");


        }
        if (selectedradio == 2) {
            $('#refferesmobilecode option').eq(2).text("Referrer's Code").val("##Referrer's Code##");
            var replit = $('#referral_popup_message').val().replace(/##Referrer's Mobile Number##/g,
                "##Referrer's Code##");
            $('#referral_popup_message').val(replit);
            $('#refferesmobilecode option').eq(3).text("Website Link").val("##Website Link##");

        }
        $('#refferesmobilecode').val('');
    });
    $('#refferesmobilecode').change(function() {
        var selectedval = $(this).val();
        var previoustextarea = $('#referral_popup_message').val();
        $('#referral_popup_message').val(previoustextarea + ' ' + selectedval);
        $('#refferesmobilecode').val('');

        if (selectedval == '##Website Link##') {
            $('#referral_website_link').show();
        }
    });
    $('#referral_popup_message').keyup(function() {
        var data = this.value;
        //check ##Website Link## is not present in data
        if (data.indexOf('##Website Link##') == -1) {
            $('#referral_website_link').hide();
            $('#referral_website_link').val('');
        } else {
            $('#referral_website_link').show();
        }

    });


    $('#referralcheckbox').click(function() {
        if ($(this).is(':checked')) {
            $('#refeeralhide').show();
            $('#referral_popup').prop("readonly", false);
        } else {
            $('#refeeralhide').hide();
            $('#referral_popup').prop("readonly", true);
        }
    });
    /*******************************Referral Work END*****************************************/


    $(document).ready(function() {

        var referral_program_permission = "{{ $ebillStructure->referral_program_permission }}";
        if (referral_program_permission == 1) {
            $('#referralcheckbox').prop('checked', true);
            $('#refeeralhide').show();
        } else {
            $('#referralcheckbox').prop('checked', false);
            $('#refeeralhide').hide();
        }
        var coupon_details_permission = "{{ $ebillStructure->coupon_details_permission }}";
        if (coupon_details_permission == 1) {
            $('#coupon_details_permission').prop('checked', true);
            $('.coupon_details_collapse').show();

        } else {
            $('#coupon_details_permission').prop('checked', false);
            $('.coupon_details_collapse').hide();
        }

        $('#coupon_details_permission').click(function() {
            if ($(this).is(':checked')) {
                $('.coupon_details_collapse').show();
            } else {
                $('.coupon_details_collapse').hide();
            }
        });


        //multiple no
				var company_number1_string = "{{$ebillStructure->company_number1}}";
				var company_number1 = company_number1_string ? company_number1_string.split(' ') : [];

				var company_number2_string = "{{$ebillStructure->company_number2}}";
				var company_number2 = company_number2_string ? company_number2_string.split(' ') : [];

				var arr_no = [
						'{{ $ebillStructure->company_number }}', 
						company_number1[1], 
						company_number2[1]  
				];
				if (arr_no.length == 1 || arr_no.length == 2) {
            var counter = arr_no.length;
        }
        if (arr_no.length == 3) {
            var counter = 3;
            $('#add_mobile').hide();
        }

        // Function to add new input field
        $('#add_mobile').click(function() {
            counter = counter < 0 ? 0 : counter;

            if (counter <= 2) {
                var newField = `
                <div class="mobile-set" id="work_mobile_head${counter+1}">
                    <div class="col-md-10 no-padding">
						<input type="text" class="form-control all-enteradd company_number" id="company_number${counter}"  data-id="${counter}" placeholder="Company Contact Number" name="company_numbernew[]" onkeypress="return isNumberKey(event);" value="" autocomplete="off" style="padding-left: 78px;"  required maxlength="10">
						<span class="category-error" id="company_numbererror${counter}"></span>
                    </div>
                    <div class="col-md-2 no-padding-right">
                        <div class="remove-mobile-rule">
                            <a class="mobile-add-set" href="javascript:void(0)" id="${counter}"><i>[-]</i></a>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>`;
                $('#mobile-container').append(newField);
            }
            if (counter >= 2) {

                $('#add_mobile').hide();
            }
            counter++;
        });

        // Function to remove input field
        $('#mobile-container').on('click', '.mobile-add-set', function() {
            var id = $(this).attr('id');
            if (counter <= 3) {
                var newid = parseInt(id) + 1;

                $('#work_mobile_head' + newid).remove();
                counter = counter < 0 ? 0 : counter;


                counter--;

                $('#add_mobile').show();
            }
        });




    });
    //end multiple no
    var dynamic_bnr_dttbl = "";
    var value = "";
    var vrsn = <?php echo $merchant->ebill_version; ?>;
    $(document).ready(function() {
        var code = "+" + '{{ $ebillStructure->country_code }}';
        var mobile_code = "{{ $ebillStructure->whatsapp_number }}";
        $('#txtMobileNumber').val(code);
        $('#txtMobileNumber').intlTelInput({
            autoHideDialCode: true,
            autoPlaceholder: "ON",
            dropdownContainer: document.body,
            formatOnDisplay: true,
            hiddenInput: "full_number",
            initialCountry: "in",
            nationalMode: true,
            separateDialCode: true
        });
        $('#txtMobileNumber').val(mobile_code);

        // $('#txtCountryCode').val(parseInt($('.iti__selected-dial-code').text()));
        $(document).on('click', '.txtCountryCode_custom .iti__selected-flag', function() {
            $("#country-listbox").addClass("county_add");
        });
        $(document).on('click', '.county_add', function() {
            $('#txtCountryCode').val(parseInt($('.txtCountryCode_custom .iti__selected-dial-code')
            .text()))
        });
        fnmobno();
        var code_company = "+" + '{{ $ebillStructure->company_countrycode }}';
        var mobile_code_company_full = '{{ $ebillStructure->company_number }}';

        //console.log(mobile_code_company_full);
        var mobile_code_company = mobile_code_company_full;
        $('#company_number').val(code_company);
        $('#company_number').intlTelInput({
            autoHideDialCode: true,
            autoPlaceholder: "ON",
            dropdownContainer: document.body,
            formatOnDisplay: true,
            hiddenInput: "full_number",
            initialCountry: "in",
            nationalMode: true,
            separateDialCode: true
        });
        if ('{{ $ebillStructure->company_countrycode }}' != "") {
            $('#company_country_code').val('{{ $ebillStructure->company_countrycode }}');
        } else {
            $('#company_country_code').val(91);
        }

        $('#company_number').val(mobile_code_company);
        $(document).on('click', '.country_set_custom .iti__selected-flag', function() {
            $("#country-listbox").addClass("county_add");
        });
        $(document).on('click', '.county_add', function(e) {
            var selected = $('.country_set_custom .iti__selected-dial-code').text();
            if (selected == '+91') {
                $("#company_number").attr('maxlength', '10');
                //alert('ok');
            } else {
                $("#company_number").attr('maxlength', '18');
            }
            $('#company_country_code').val(parseInt($('.country_set_custom .iti__selected-dial-code')
                .text()))
            numlength(e);
        });

        $(document).on('click', '.logoimagecl1, .logoimagecl2', function() {
            var isChecked = $(this).prop('checked');
            $('.logoimagecl1, .logoimagecl2').not(this).prop('checked', !isChecked);
            if ($("#logoimage_collapse_id").is(":checked")) {
                $(".logoimage_collapse").addClass("in");
            } else {
                $(".logoimage_collapse").removeClass("in");
            }
        });

        $('#logo_image_size').change(function() {
            if ($(this).val() == 1) {
                $('.ratio43').removeClass('none');
                $('.ratio51').addClass('none');
                $('.logoimgtype').addClass('none');
            } else {
                $('.ratio43').addClass('none');
                $('.ratio51').removeClass('none');
                $('.logoimgtype').removeClass('none');
            }
        });

        $('#txtMobileNumber').keyup(function() {
            this.value = this.value.replace(/[^0-9\.]/g, '');
            if ($('#txtCountryCode').val() == 91 && $('#txtMobileNumber').val().length != 10) {
                $('#link_WhatsApp_error').text("Number must be 10 digit.");
                return false;
            } else {
                $('#link_WhatsApp_error').text("");
            }
        });
        $('#customer_care_mobile').keyup(function() {
            this.value = this.value.replace(/[^0-9\.]/g, '');
            if ($('#txtCountryCode').val() == 91 && $('#customer_care_mobile').val().length != 10) {
                $('#customer_care_mobile_error').text("Number must be 10 digit.");
                return false;
            } else {
                $('#customer_care_mobile_error').text("");
            }
        });

        //AD
        $(document).on('click', '.county_add_sms', function() {
            var selected = $('.text_sms_body .iti__selected-dial-code').text();
            if (selected == '+91') {
                $(".testmessage_SMS").attr('maxlength', '10');
            } else {
                $(".testmessage_SMS").attr('maxlength', '15');
            }
            $('#country_code_sms').val(parseInt($('.text_sms_body .iti__selected-dial-code').text()));
        });

        $('#ebill_structure_submit_id').click(function() {
            // numlength(e);
            if ($('#social_link_permission_id').prop('checked') == true) {
                if ($('#social_link_header').val() == '') {
                    $('#social_link_header_error').text("Please enter social link header.");
                    return false;
                } else {
                    $('#social_link_header_id_error').text("");
                }

                if ($('#link_Facebook').val().trim() != "" || $('#link_Twitter').val().trim() != "" ||
                    $('#link_Youtube').val().trim() != "" || $('#link_Instagram').val().trim() != "" ||
                    $('#txtMobileNumber').val().trim() != "" || $('#customer_care_mobile').val()
                .trim() != "" || $('#customer_care_email').val().trim() != "" || $(
                        '#brand_website_link').val().trim() != "") {
                    if ($('#txtCountryCode').val() == 91) {
                        //alert("work");
                        if ($('#txtMobileNumber').val() != "") {
                            //alert("work");
                            if ($('#txtMobileNumber').val().length != 10) {
                                $('#link_WhatsApp_error').text("Number must be 10 digit.");
                                //$('#txtMobileNumber').val("");
                                e.preventDefault();
                                return false;
                            }
                        }
                        if ($('#customer_care_mobile').val() != "") {
                            //alert("work");
                            if ($('#customer_care_mobile').val().length != 10) {
                                $('#customer_care_mobile_error').text("Number must be 10 digit.");
                                //$('#txtMobileNumber').val("");
                                e.preventDefault();
                                return false;
                            }
                        }
                        // else{
                        // 	$('#link_WhatsApp_error').text("Number is required.");
                        //         e.preventDefault();
                        //         return false;
                        // }	
                    }
                } else {
                    alert("Atleast one social link need.");
                    e.preventDefault();
                    $('#link_Facebook').focus();
                    return false;
                }
            }
            if ($('#company_number_permission_id').is(':checked')) {
                if ($('#company_country_code').val() == 91 && $('#company_number').val().length < 10) {
                    $('#company_numbererror').text("Number must be 10 digits.");
                    $('#company_number').focus();
                    return false;
                }
                if ($('#company_number2').val() != "") {
                    if ($('#company_number2').val().length != 10) {
                        $('#company_numbererror2').text("Number must be 10 digit.");
                        $('#company_number2').focus();
                        return false;
                    } else {
                        $('#company_numbererror2').text("");
                    }

                }
                if ($('#company_number3').val() != "") {
                    if ($('#company_number3').val().length != 10) {
                        $('#company_numbererror3').text("Number must be 10 digit.");
                        $('#company_number3').focus();
                        return false;
                    } else {
                        $('#company_numbererror3').text("");
                    }
                }

            }
        });

        $(document).on('keypress', function(e) {
            if (e.which === 13) {
                if ($('#social_link_permission_id').prop('checked') == true) {
                    if ($('#social_link_header').val() == '') {
                        $('#social_link_header_error').text("Please enter social link header.");
                        return false;
                    } else {
                        $('#social_link_header_id_error').text("");
                    }

                    if ($('#link_Facebook').val().trim() != "" || $('#link_Twitter').val().trim() !=
                        "" || $('#link_Youtube').val().trim() != "" || $('#link_Instagram').val()
                    .trim() != "" || $('#txtMobileNumber').val().trim() != "" || $(
                            '#customer_care_mobile').val().trim() != "" || $('#customer_care_email')
                        .val().trim() != "" || $('#brand_website_link').val().trim() != "") {
                        if ($('#txtCountryCode').val() == 91) {
                            //alert("work");
                            if ($('#txtMobileNumber').val() != "") {
                                //alert("work");
                                if ($('#txtMobileNumber').val().length != 10) {
                                    $('#link_WhatsApp_error').text("Number must be 10 digit.");
                                    //$('#txtMobileNumber').val("");
                                    e.preventDefault();
                                    return false;
                                }
                            }
                            if ($('#customer_care_mobile').val() != "") {
                                //alert("work");
                                if ($('#customer_care_mobile').val().length != 10) {
                                    $('#customer_care_mobile_error').text("Number must be 10 digit.");
                                    //$('#txtMobileNumber').val("");
                                    e.preventDefault();
                                    return false;
                                }
                            }
                            // else{
                            // 	$('#link_WhatsApp_error').text("Number is required.");
                            //         e.preventDefault();
                            //         return false;
                            // }	
                        }
                    } else {
                        alert("Atleast one social link need.");
                        e.preventDefault();
                        $('#link_Facebook').focus();
                        return false;
                    }
                }
            }
        });
        $('.bnrtbl').each(function() {
            //alert("ok");
            $(this).DataTable({
                "bProcessing": true,
                "bLengthChange": true,
                "bPaginate": false,
                "info": false,
                "paging": false,
                "bFilter": false,
            });
        });

        $('.clLink').change(function() {
            if ($(this).closest('.dv_Lnk').find('[type=checkbox]').prop('checked') == true && $(
                    '#toolbar_permission_id').prop('checked') == true) {
                //alert("ok");
                var myVariable = $(this).val().trim();
                if (/^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/
                    .test(myVariable)) {
                    if ($(this).prop('name') == 'home_link') {
                        $('#home_linkerror').html("");
                    }
                    if ($(this).prop('name') == 'login_link') {
                        $('#login_linkerror').html("");
                    }
                    if ($(this).prop('name') == 'menu_link') {
                        $('#menu_linkerror').html("");
                    }
                    if ($(this).prop('name') == 'website_link') {
                        $('#website_linkerror').html("");
                    }
                } else {
                    if ($(this).prop('name') == 'home_link') {
                        $('#home_linkerror').html("Link  is not in the correct format");
                        $(this).focus();
                    }
                    if ($(this).prop('name') == 'login_link') {
                        $('#login_linkerror').html("Link  is not in the correct format");
                        $(this).focus();
                    }
                    if ($(this).prop('name') == 'menu_link') {
                        $('#menu_linkerror').html("Link  is not in the correct format");
                        $(this).focus();
                    }
                    if ($(this).prop('name') == 'website_link') {
                        $('#website_linkerror').html("Link  is not in the correct format");
                        $(this).focus();
                    }
                    return false;
                }
            } else {
                $('#home_linkerror').html("");
                $('#login_linkerror').html("");
                $('#menu_linkerror').html("");
                $('#website_linkerror').html("");
            }
        });
    });


    function fnmobno() {
        $('#link_WhatsApp_error').text("");
        $('#customer_care_mobile_error').text("");
        if ($('#txtCountryCode').val() == 91) {
            $('#txtMobileNumber').prop('maxlength', '10');
            if ($('#txtMobileNumber').val() != "" && $('#txtMobileNumber').val().length != 10) {
                $('#link_WhatsApp_error').text("Number must be 10 digit.");
                $('#txtMobileNumber').val("");
                return false;
            }
            if ($('#customer_care_mobile').val() != "" && $('#customer_care_mobile').val().length != 10) {
                $('#customer_care_mobile_error').text("Number must be 10 digit.");
                $('#customer_care_mobile').val("");
                return false;
            }
        } else {
            $('#txtMobileNumber').prop('maxlength', '18');
            $('#link_WhatsApp_error').text("");
            $('#customer_care_mobile').prop('maxlength', '18');
            $('#customer_care_mobile_error').text("");
        }
    }
    var _URL = window.URL || window.webkitURL;
    $("input[name=logo_image_43]").change(function(e) {
        // $('#addbannersubmit').attr('disabled',false);
        $('#addbannererror_43').html('');
        var banner_image = $('input[name=logo_image_43]').val();
        if (banner_image) {
            $('.clearimage').show();
            $('#addpushimage_43').html('Change Image');
            if (!banner_image.match(/(?:jpg|png|jpeg|JPEG|PNG|JPG)$/)) {
                $('#addbannererror_43').html("This file format is not accepted");
                // $('#addbannersubmit').attr('disabled','disabled');
            } else {
                var file, img;
                if ((file = this.files[0])) {
                    img = new Image();
                    img.onload = function() {
                        var ratio = 320 / 240;
                        var imageratio = (this.width) / (this.height);
                        if (ratio == imageratio) {
                            var iSize = ($('input[name=logo_image_43]')[0].files[0].size / 1024);
                            iSize = (Math.round(iSize * 100) / 100);
                            if (iSize <= 50) {
                                $('#ebill_structure_submit_id').attr('disabled', false);
                                $('#save_apply').attr('disabled', false);
                            } else {
                                $('#addbannererror_43').html(
                                    'Maximum File size should be 50 KB. Your file size is ' + iSize +
                                    ' KB');
                                $('#ebill_structure_submit_id').attr('disabled', 'disabled');
                                $('#save_apply').attr('disabled', 'disabled');
                            }
                        } else {
                            $('#addbannererror_43').html('Image Ratio Should be Exact 4 : 3.');
                            $('#ebill_structure_submit_id').attr('disabled', 'disabled');
                            $('#save_apply').attr('disabled', 'disabled');
                        }
                    };
                    img.src = _URL.createObjectURL(file);
                }
            }
        } else {
            $('.clearimage').hide();
            $('#addpushimage_43').html('Add Image');
            $('#blah_add_banneradd_43').attr('src', "{{ asset('images/icon/Icons-01.png') }}");
        }
    });

    var _URL = window.URL || window.webkitURL;
    $("input[name=logo_image_51]").change(function(e) {
        // $('#addbannersubmit').attr('disabled',false);
        $('#addbannererror_51').html('');
        var banner_image = $('input[name=logo_image_51]').val();
        if (banner_image) {
            $('.clearimage').show();
            $('#addpushimage_51').html('Change Image');
            if (!banner_image.match(/(?:jpg|png|jpeg|JPEG|PNG|JPG)$/)) {
                $('#addbannererror_51').html("This file format is not accepted");
                // $('#addbannersubmit').attr('disabled','disabled');
            } else {
                var file, img;
                if ((file = this.files[0])) {
                    img = new Image();
                    img.onload = function() {
                        var ratio = 500 / 200;
                        var imageratio = (this.width) / (this.height);
                        if (ratio == imageratio) {
                            var iSize = ($('input[name=logo_image_51]')[0].files[0].size / 1024);
                            iSize = (Math.round(iSize * 100) / 100);
                            if (iSize <= 100) {
                                $('#ebill_structure_submit_id').attr('disabled', false);
                                $('#save_apply').attr('disabled', false);
                            } else {
                                $('#addbannererror_51').html(
                                    'Maximum File size should be 50 KB. Your file size is ' + iSize +
                                    ' KB');
                                $('#ebill_structure_submit_id').attr('disabled', 'disabled');
                                $('#save_apply').attr('disabled', 'disabled');
                            }
                        } else {
                            $('#addbannererror_51').html('Image Ratio Should be Exact 5 : 2.');
                            $('#ebill_structure_submit_id').attr('disabled', 'disabled');
                            $('#save_apply').attr('disabled', 'disabled');
                        }
                    };
                    img.src = _URL.createObjectURL(file);
                }
            }
        } else {
            $('.clearimage').hide();
            $('#addpushimage_51').html('Add Image');
            $('#blah_add_banneradd_51').attr('src', "{{ asset('images/icon/Icons-01.png') }}");
        }
    });

    function validationColumnPriyo() {
        var main_arr = [];
        var main = 1;
        var mcCount = 0;
        var cCount = 0;
        var mtoolarr = [];
        var maincheckarr = [];

        function toolarrpushvalidatePriority(permissionId, priorityName) {
            // if(permissionId!="#company_name_permission_id"){
            if ($(permissionId).is(":checked")) {
                var priority = $(priorityName).val();
                cCount++;
                toolarr.push(parseInt(priority));
            }
            // }
        }

        function toolarrpushvalidatePriorityCheckForOutSide(permissionId, priorityName) {
            if ($(permissionId).is(":checked")) {
                var priority = $(priorityName).val();
                mcCount++;
                cCount++;
                mtoolarr.push(parseInt(priority));
            }
        }

        function toolarrpushvalidatePriorityCheckForOutSide2(permissionId, priorityId) {
            //alert(permissionId);
            //alert($("#"+priorityId).val());
            if ($(permissionId).is(":checked")) {
                var priority = $(priorityId).val();
                mcCount++;
                cCount++;
                mtoolarr.push(parseInt(priority));
            }
        }


        function findMissingNumber(arr) {
            const n = arr.length + 1; // Adding 1 to account for the missing number
            const expectedSum = (n * (n + 1)) / 2; // Sum of numbers from 1 to n
            const actualSum = arr.reduce((sum, num) => sum + num, 0);
            return expectedSum - actualSum;
        }

        function validatePriority(permissionId, priorityName, priorityErrorId, bodyId) {
            var priorityId = "";
            if ($(permissionId).is(":checked")) {
                var priority = $(priorityName).val();
                if (priority === "") {
                    $(priorityErrorId).html('Priority cannot be Blank');
                    $(priorityErrorId).addClass('set-erroe-custom');
                    $(priorityName).focus();
                    return false;
                }
                if (priority == 0) {
                    $(priorityErrorId).html('Priority cannot be 0');
                    $(priorityErrorId).addClass('set-erroe-custom');
                    $(priorityName).focus();
                    return false;
                }
                if (checkarr.indexOf(parseInt(priority)) !== -1) {
                    if (priorityId == "") {
                        $(priorityName).val('');
                    }
                    $(priorityErrorId).html('Priority must be unique');
                    $(priorityErrorId).addClass('set-erroe-custom');
                    $(priorityName).focus();
                    return false;
                }
                if (parseInt(priority) > cCount) {
                    var missingNumber = findMissingNumber(toolarr);
                    //alert(missingNumber);
                    if (priorityId == "") {
                        $(priorityName).val('');
                    }
                    $(priorityErrorId).html('Priority cannot be greater than ' + cCount);
                    //$(priorityErrorId).html('Priority need to be ' + missingNumber);
                    $(priorityErrorId).addClass('set-erroe-custom');
                    $(priorityName).focus();
                    return false;
                }
                checkarr.push(parseInt(priority));
                $(priorityErrorId).html('');
                $(priorityErrorId).removeClass('set-erroe-custom');
            } else {
                // If permission is unchecked, remove the associated priority from the toolarr
                var priority = $(priorityName).val();
                var index = toolarr.indexOf(parseInt(priority));
                if (index !== -1) {
                    toolarr.splice(index, 1);
                }
                // Update the priorities of remaining checked permissions
                $("." + bodyId + " input[type='checkbox']:checked").each(function(index) {
                    var $priorityInput = $(this).siblings("input[type='text']");
                    $priorityInput.val(index + 1);
                    // Clear the error message for the current priority input
                    $priorityInput.siblings(".priority-error").html('');
                    $priorityInput.siblings(".priority-error").removeClass('set-erroe-custom');
                });
            }
        }

        function validatePriorityCheckForOutSide(permissionId, priorityName, priorityErrorId) {
            var priorityId = "";
            // console.log(maincheckarr);
            // console.log(mcCount);
            // return false;
            if ($(permissionId).is(":checked")) {
                // mcCount++;
                var priority = $(priorityName).val();
                if (priority === "") {
                    $(priorityErrorId).html('Priority cannot be blank');
                    $(priorityErrorId).addClass('set-erroe-custom');
                    $(priorityName).focus();
                    return false;
                }
                if (priority == 0) {
                    $(priorityErrorId).html('Priority cannot be 0');
                    $(priorityErrorId).addClass('set-erroe-custom');
                    $(priorityName).focus();
                    return false;
                }
                if (maincheckarr.indexOf(parseInt(priority)) !== -1) {
                    if (priorityId == "") {
                        $(priorityName).val('');
                    }
                    $(priorityErrorId).html('Priority must be unique');
                    $(priorityErrorId).addClass('set-erroe-custom');
                    $(priorityName).focus();
                    return false;
                }
                //alert(cCount);
                if (parseInt(priority) > mcCount) {
                    //var missingNumber = findMissingNumber(toolarr);
                    //alert(missingNumber);
                    if (priorityId == "") {
                        $(priorityName).val('');
                    }
                    $(priorityErrorId).html('Priority cannot be greater than ' + mcCount);
                    //$(priorityErrorId).html('Priority need to be ' + missingNumber);
                    $(priorityErrorId).addClass('set-erroe-custom');
                    $(priorityName).focus();
                    return false;
                }
                maincheckarr.push(parseInt(priority));
                $(priorityErrorId).html('');
                $(priorityErrorId).removeClass('set-erroe-custom');
            } else {
                // If permission is unchecked, remove the associated priority from the toolarr
                /*var priority = $(priorityName).val();
                var index = toolarr.indexOf(parseInt(priority));
                if (index !== -1) {
                	toolarr.splice(index, 1);
                }
                // Update the priorities of remaining checked permissions
                $("."+bodyId+" input[type='checkbox']:checked").each(function (index) {
                	var $priorityInput = $(this).siblings("input[type='text']");
                	$priorityInput.val(index + 1);
                	// Clear the error message for the current priority input
                	$priorityInput.siblings(".priority-error").html('');
                	$priorityInput.siblings(".priority-error").removeClass('set-erroe-custom');
                });*/
            }
        }

        function validatePriorityCheckForOutSide2(permissionId, priorityId, priorityErrorId) {
            if ($(permissionId).is(":checked")) {
                //mcCount++;
                var priority = $(priorityId).val();
                if (priority === "") {
                    $(priorityErrorId).html('Priority cannot be blank');
                    $(priorityErrorId).addClass('set-erroe-custom');
                    $(priorityId).focus();
                    return false;
                }
                if (priority == 0) {
                    $(priorityErrorId).html('Priority cannot be 0');
                    $(priorityErrorId).addClass('set-erroe-custom');
                    $(priorityId).focus();
                    return false;
                }
                if (maincheckarr.indexOf(parseInt(priority)) !== -1) {
                    $(priorityId).val('');
                    $(priorityErrorId).html('Priority must be unique');
                    $(priorityErrorId).addClass('set-erroe-custom');
                    $(priorityId).focus();
                    return false;
                }
                if (parseInt(priority) > mcCount) {
                    //var missingNumber = findMissingNumber(toolarr);
                    //alert(mcCount);
                    $(priorityId).val('');
                    $(priorityErrorId).html('Priority cannot be greater than ' + mcCount);
                    //$(priorityErrorId).html('Priority need to be ' + missingNumber);
                    $(priorityErrorId).addClass('set-erroe-custom');
                    $(priorityId).focus();
                    return false;
                }
                maincheckarr.push(parseInt(priority));
                $(priorityErrorId).html('');
                $(priorityErrorId).removeClass('set-erroe-custom');
            } else {
                // If permission is unchecked, remove the associated priority from the toolarr
                /*var priority = $(priorityName).val();
                var index = toolarr.indexOf(parseInt(priority));
                if (index !== -1) {
                	toolarr.splice(index, 1);
                }
                // Update the priorities of remaining checked permissions
                $("."+bodyId+" input[type='checkbox']:checked").each(function (index) {
                	var $priorityInput = $(this).siblings("input[type='text']");
                	$priorityInput.val(index + 1);
                	// Clear the error message for the current priority input
                	$priorityInput.siblings(".priority-error").html('');
                	$priorityInput.siblings(".priority-error").removeClass('set-erroe-custom');
                });*/
            }
        }

        if ($("#toolbar_permission_id").is(":checked")) {
            var toolarr = [];
            var checkarr = [];
            var cCount = 0;
            var i = 1;
            if (parseInt('{{ $merchant->ebill_version }}') == 1) {
                if (toolarrpushvalidatePriority("#home_permission_id", 'input[name="home_priority"]') === false) {
                    return false;
                }
            }

            if (toolarrpushvalidatePriority("#login_permission_id", 'input[name="login_priority"]') === false) {
                return false;
            }

            if (toolarrpushvalidatePriority("#menu_permission_id", 'input[name="menu_priority"]') === false) {
                return false;
            }

            if (toolarrpushvalidatePriority("#share_permission_id", 'input[name="share_priority"]') === false) {
                return false;
            }

            if (toolarrpushvalidatePriority("#save_permission_id", 'input[name="save_priority"]') === false) {
                return false;
            }
            if (toolarrpushvalidatePriority("#website_permission_id", 'input[name="website_priority"]') === false) {
                return false;
            }
            // Validate the checked priority count
            var versionv2errorcheck = 1;
            if (parseInt('{{ $merchant->ebill_version }}') == 2) {
                if (cCount >= 1) {
                    versionv2errorcheck = 0;
                } else {
                    if ($("#home_permission_id").is(":checked")) {
                        versionv2errorcheck = 0;
                    }
                }
            }
            if ((cCount < 1 && parseInt('{{ $merchant->ebill_version }}') == 1) || (versionv2errorcheck == 1 &&
                    parseInt('{{ $merchant->ebill_version }}') == 2)) {
                $("#toolbar_permissionerror").html('Please enable at least one field for the toolbar tile');
                $("#toolbar_permissionerror").addClass('set-erroe-custom');
                return false;
            } else {
                $("#toolbar_permissionerror").html('');
                $("#toolbar_permissionerror").removeClass('set-erroe-custom');
            }
            if (parseInt('{{ $merchant->ebill_version }}') == 1) {
                if (validatePriority("#home_permission_id", 'input[name="home_priority"]', "#home_priorityerror",
                        "panel-body-toolbar") === false) {
                    return false;
                }
            }

            if (validatePriority("#login_permission_id", 'input[name="login_priority"]', "#login_priorityerror",
                    "panel-body-toolbar") === false) {
                return false;
            }

            if (validatePriority("#menu_permission_id", 'input[name="menu_priority"]', "#menu_priorityerror",
                    "panel-body-toolbar") === false) {
                return false;
            }

            if (validatePriority("#share_permission_id", 'input[name="share_priority"]', "#share_priorityerror",
                    "panel-body-toolbar") === false) {
                return false;
            }

            if (validatePriority("#save_permission_id", 'input[name="save_priority"]', "#save_priorityerror",
                    "panel-body-toolbar") === false) {
                return false;
            }
            if (validatePriority("#website_permission_id", 'input[name="website_priority"]', "#website_priorityerror",
                    "panel-body-toolbar") === false) {
                return false;
            }
        }

        if ($("#company_details_permission_id").is(":checked")) {
            main_arr.push(main);
            main++;
            // new code
            var toolarr = [];
            var checkarr = [];
            var cCount = 0;
            var i = 1;

            if (toolarrpushvalidatePriority("#company_address1_permission_id", 'input[name="address1_priority"]') ===
                false) {
                return false;
            }

            if (toolarrpushvalidatePriority("#company_address2_permission_id", 'input[name="address2_priority"]') ===
                false) {
                return false;
            }

            if (toolarrpushvalidatePriority("#company_address3_permission_id", 'input[name="address3_priority"]') ===
                false) {
                return false;
            }

            if (toolarrpushvalidatePriority("#gst_permission_id", 'input[name="gst_priority"]') === false) {
                return false;
            }

            if (toolarrpushvalidatePriority("#legal_name_permission_id", 'input[name="legal_name_priority"]') ===
                false) {
                return false;
            }
            if (toolarrpushvalidatePriority("#company_number_permission_id",
                'input[name="company_number_priority"]') === false) {
                return false;
            }
            // Validate the checked priority count
            // console.log(cCount);
            // if(cCount < 1 && parseInt('{{ $merchant->ebill_version }}') == 1 || cCount < 1 && parseInt('{{ $merchant->ebill_version }}') == 2 && $("#company_name_permission_id").is(":not(:checked)"))
            if (cCount < 1 && $("#company_name_permission_id").is(":not(:checked)")) {
                // console.log(1);
                $("#company_details_priorityerror").html('Please check 1 item');
                $("#company_details_priorityerror").addClass('set-erroe-custom');
                return false;
            } else {
                // console.log(2);
                $("#company_details_priorityerror").html('');
                $("#company_details_priorityerror").removeClass('set-erroe-custom');
            }
            if (validatePriority("#company_address1_permission_id", 'input[name="address1_priority"]',
                    "#address1_priorityerror", "panel-body-company-details") === false) {
                return false;
            }

            if (validatePriority("#company_address2_permission_id", 'input[name="address2_priority"]',
                    "#address2_priorityerror", "panel-body-company-details") === false) {
                return false;
            }

            if (validatePriority("#company_address3_permission_id", 'input[name="address3_priority"]',
                    "#address3_priorityerror", "panel-body-company-details") === false) {
                return false;
            }

            if (validatePriority("#gst_permission_id", 'input[name="gst_priority"]', "#gst_priorityerror",
                    "panel-body-company-details") === false) {
                return false;
            }

            if (validatePriority("#company_number_permission_id", 'input[name="company_number_priority"]',
                    "#company_number_priorityerror", "panel-body-company-details") === false) {
                return false;
            }
            if (validatePriority("#legal_name_permission_id", 'input[name="legal_name_priority"]',
                    "#legal_name_priorityerror", "panel-body-company-details") === false) {
                return false;
            }

            //toolarrpushvalidatePriorityCheckForOutSide('#company_details_permission_id', 'input[name="company_details_priority"]');
            //end of new code
        }


        if ($("#bill_details_permission_id").is(":checked")) {
            main_arr.push(main);
            main++;
            // new code start
            var toolarr = [];
            var checkarr = [];
            var cCount = 0;
            var i = 1;

            if (toolarrpushvalidatePriority("#transactionid_permission_id", 'input[name="transactionid_priority"]') ===
                false) {
                return false;
            }
            if (toolarrpushvalidatePriority("#bill_number_permission_id", 'input[name="bill_number_priority"]') ===
                false) {
                return false;
            }
            if (toolarrpushvalidatePriority("#bill_date_permission_id", 'input[name="bill_date_priority"]') === false) {
                return false;
            }
            if (toolarrpushvalidatePriority("#bill_time_permission_id", 'input[name="bill_time_priority"]') === false) {
                return false;
            }
            if (toolarrpushvalidatePriority("#section_permission_id", 'input[name="section_priority"]') === false) {
                return false;
            }
            if (toolarrpushvalidatePriority("#table_permission_id", 'input[name="table_priority"]') === false) {
                return false;
            }
            if (toolarrpushvalidatePriority("#server_permission_id", 'input[name="server_priority"]') === false) {
                return false;
            }
            if (toolarrpushvalidatePriority("#service_permission_id", 'input[name="service_priority"]') === false) {
                return false;
            }
            if (toolarrpushvalidatePriority("#channel_permission_id", 'input[name="channel_priority"]') === false) {
                return false;
            }

            if (toolarrpushvalidatePriority("#payment_mode_permission_id", 'input[name="payment_mode_priority"]') ===
                false) {
                return false;
            }
            if (toolarrpushvalidatePriority("#customer_gstin_permission_id",
                'input[name="customer_gstin_priority"]') === false) {
                return false;
            }

            if (toolarrpushvalidatePriority("#customer_storename_permission_id",
                    'input[name="customer_storename_priority"]') === false) {
                return false;
            }
            // Validate the checked priority count
            if (cCount < 1) {
                $("#bill_details_priorityerror").html('Please check 1 item');
                $("#bill_details_priorityerror").addClass('set-erroe-custom');
                return false;
            } else {
                $("#bill_details_priorityerror").html('');
                $("#bill_details_priorityerror").removeClass('set-erroe-custom');
            }


            if (validatePriority("#transactionid_permission_id", 'input[name="transactionid_priority"]',
                    "#transactionid_priorityerror", "panel-body-bill-details") === false) {
                return false;
            }

            if (validatePriority("#bill_number_permission_id", 'input[name="bill_number_priority"]',
                    "#bill_number_priorityerror", "panel-body-bill-details") === false) {
                return false;
            }

            if (validatePriority("#bill_date_permission_id", 'input[name="bill_date_priority"]',
                    "#bill_date_priorityerror", "panel-body-bill-details") === false) {
                return false;
            }

            if (validatePriority("#bill_time_permission_id", 'input[name="bill_time_priority"]',
                    "#bill_time_priorityerror", "panel-body-bill-details") === false) {
                return false;
            }

            if (validatePriority("#section_permission_id", 'input[name="section_priority"]', "#section_priorityerror",
                    "panel-body-bill-details") === false) {
                return false;
            }
            if (validatePriority("#table_permission_id", 'input[name="table_priority"]', "#table_priorityerror",
                    "panel-body-bill-details") === false) {
                return false;
            }

            if (validatePriority("#server_permission_id", 'input[name="server_priority"]', "#server_priorityerror",
                    "panel-body-bill-details") === false) {
                return false;
            }

            if (validatePriority("#service_permission_id", 'input[name="service_priority"]', "#service_priorityerror",
                    "panel-body-bill-details") === false) {
                return false;
            }

            if (validatePriority("#channel_permission_id", 'input[name="channel_priority"]', "#channel_priorityerror",
                    "panel-body-bill-details") === false) {
                return false;
            }



            if (validatePriority("#payment_mode_permission_id", 'input[name="payment_mode_priority"]',
                    "#payment_mode_priorityerror", "panel-body-bill-details") === false) {
                return false;
            }

            if (validatePriority("#customer_gstin_permission_id", 'input[name="customer_gstin_priority"]',
                    "#customer_gstin_priorityerror", "panel-body-bill-details") === false) {
                return false;
            }


            if (validatePriority("#customer_storename_permission_id", 'input[name="customer_storename_priority"]',
                    "#customer_storename_priorityerror", "panel-body-bill-details") === false) {
                return false;
            }
            toolarrpushvalidatePriorityCheckForOutSide('#bill_details_permission_id',
                'input[name="bill_details_priority"]');
            // new code ends
        }


        if ($("#delivery_address_details_permission_id").is(":checked")) {
            main_arr.push(main);
            main++;
            // new code
            var toolarr = [];
            var checkarr = [];
            var cCount = 0;
            var i = 1;

            if (toolarrpushvalidatePriority("#delivery_address_permission_id",
                    'input[name="delivery_address_priority"]') === false) {
                return false;
            }
            if (toolarrpushvalidatePriority("#customer_name_permission_id", 'input[name="customer_name_priority"]') ===
                false) {
                return false;
            }
            if (toolarrpushvalidatePriority("#customer_number_permission_id",
                'input[name="customer_number_priority"]') === false) {
                return false;
            }
            if (toolarrpushvalidatePriority("#city_permission_id", 'input[name="city_priority"]') === false) {
                return false;
            }
            if (toolarrpushvalidatePriority("#pincode_permission_id", 'input[name="pincode_priority"]') === false) {
                return false;
            }
            if (toolarrpushvalidatePriority("#landmark_permission_id", 'input[name="landmark_priority"]') === false) {
                return false;
            }
            if (toolarrpushvalidatePriority("#customer_pan_permission_id", 'input[name="customer_pan_priority"]') ===
                false) {
                return false;
            }
            // Validate the checked priority count
            if (cCount < 1) {
                $("#delivery_address_details_priorityerror").html('Please check 1 item');
                $("#delivery_address_details_priorityerror").addClass('set-erroe-custom');
                return false;
            } else {
                $("#delivery_address_details_priorityerror").html('');
                $("#delivery_address_details_priorityerror").removeClass('set-erroe-custom');
            }
            if (validatePriority("#customer_name_permission_id", 'input[name="customer_name_priority"]',
                    "#customer_name_priorityerror", "panel-body-delivery-address-details") === false) {
                return false;
            }
            if (validatePriority("#customer_number_permission_id", 'input[name="customer_number_priority"]',
                    "#customer_number_priorityerror", "panel-body-delivery-address-details") === false) {
                return false;
            }
            if (validatePriority("#delivery_address_permission_id", 'input[name="delivery_address_priority"]',
                    "#delivery_address_priorityerror", "panel-body-delivery-address-details") === false) {
                return false;
            }
            if (validatePriority("#city_permission_id", 'input[name="city_priority"]', "#city_priorityerror",
                    "panel-body-delivery-address-details") === false) {
                return false;
            }
            if (validatePriority("#customer_pan_permission_id", 'input[name="customer_pan_priority"]',
                    "#customer_pan_priorityerror", "panel-body-delivery-address-details") === false) {
                return false;
            }
            if (validatePriority("#pincode_permission_id", 'input[name="pincode_priority"]', "#pincode_priorityerror",
                    "panel-body-delivery-address-details") === false) {
                return false;
            }
            if (validatePriority("#landmark_permission_id", 'input[name="landmark_priority"]',
                    "#landmark_priorityerror", "panel-body-delivery-address-details") === false) {
                return false;
            }
            toolarrpushvalidatePriorityCheckForOutSide('#delivery_address_details_permission_id',
                'input[name="delivery_address_details_priority"]');
            //new code end
        }


        if ($("#item_details_permission_id").is(":checked")) {
            main_arr.push(main);
            main++;
            // new code
            var toolarr = [];
            var checkarr = [];
            var cCount = 0;
            var i = 1;
            if (parseInt('{{ $merchant->ebill_version }}') == 1) {
                if (toolarrpushvalidatePriority("#items_permission_id", 'input[name="items_priority"]') === false) {
                    return false;
                }
            }
            if (parseInt('{{ $merchant->ebill_version }}') == 1) {
                if (toolarrpushvalidatePriority("#bar_code_permission_id", 'input[name="bar_code_priority"]') ===
                    false) {
                    return false;
                }
            }
            if (parseInt('{{ $merchant->ebill_version }}') == 1) {
                if (toolarrpushvalidatePriority("#item_tax_permission_id", 'input[name="item_tax_priority"]') ===
                    false) {
                    return false;
                }
            }
            if (parseInt('{{ $merchant->ebill_version }}') == 1) {
                if (toolarrpushvalidatePriority("#hsn_code_permission_id", 'input[name="hsn_code_priority"]') ===
                    false) {
                    return false;
                }
            }
            if (toolarrpushvalidatePriority("#item_quantity_permission_id", 'input[name="item_quantity_priority"]') ===
                false) {
                return false;
            }
            if (toolarrpushvalidatePriority("#marked_price_permission_id", 'input[name="marked_price_priority"]') ===
                false) {
                return false;
            }
            if (toolarrpushvalidatePriority("#item_rate_permission_id", 'input[name="item_rate_priority"]') === false) {
                return false;
            }
            if (toolarrpushvalidatePriority("#item_price_permission_id", 'input[name="item_price_priority"]') ===
                false) {
                return false;
            }
            if (toolarrpushvalidatePriority("#item_discount_permission_id", 'input[name="item_discount_priority"]') ===
                false) {
                return false;
            }
            if (toolarrpushvalidatePriority("#rsp_permission_id", 'input[name="item_rsv_priority"]') === false) {
                return false;
            }
            if (parseInt('{{ $merchant->ebill_version }}') == 1) {
                if (toolarrpushvalidatePriority("#addon_item_permission_id", 'input[name="addon_item_priority"]') ===
                    false) {
                    return false;
                }
            }
            if (parseInt('{{ $merchant->ebill_version }}') == 1) {
                if (toolarrpushvalidatePriority("#addon_category_permission_id",
                        'input[name="addon_category_priority"]') === false) {
                    return false;
                }
            }
            // Validate the checked priority count
            //if(cCount < 1)
            if (cCount < 1 && parseInt('{{ $merchant->ebill_version }}') == 1 || (cCount < 1 && parseInt(
                    '{{ $merchant->ebill_version }}') == 2 && $("#items_permission_id").is(":not(:checked)") && $(
                    "#bar_code_permission_id").is(":not(:checked)") && $("#item_tax_permission_id").is(
                    ":not(:checked)") && $("#hsn_code_permission_id").is(":not(:checked)") && $(
                    "#addon_item_permission_id").is(":not(:checked)") && $("#addon_category_permission_id").is(
                    ":not(:checked)"))) {
                $("#bill_details_priorityerror").html('Please check 1 item');
                $("#bill_details_priorityerror").addClass('set-erroe-custom');
                return false;
            } else {
                $("#bill_details_priorityerror").html('');
                $("#bill_details_priorityerror").removeClass('set-erroe-custom');
            }
            if (validatePriority("#items_permission_id", 'input[name="items_priority"]', "#items_priorityerror",
                    "panel-body-item-details") === false) {
                return false;
            }
            if (validatePriority("#bar_code_permission_id", 'input[name="bar_code_priority"]',
                    "#bar_code_priorityerror", "panel-body-item-details") === false) {
                return false;
            }
            if (validatePriority("#item_tax_permission_id", 'input[name="item_tax_priority"]',
                    "#item_tax_priorityerror", "panel-body-item-details") === false) {
                return false;
            }
            if (validatePriority("#hsn_code_permission_id", 'input[name="hsn_code_priority"]',
                    "#hsn_code_priorityerror", "panel-body-item-details") === false) {
                return false;
            }
            if (validatePriority("#item_quantity_permission_id", 'input[name="item_quantity_priority"]',
                    "#item_quantity_priorityerror", "panel-body-item-details") === false) {
                return false;
            }
            if (validatePriority("#marked_price_permission_id", 'input[name="marked_price_priority"]',
                    "#marked_price_priorityerror", "panel-body-item-details") === false) {
                return false;
            }
            if (validatePriority("#item_rate_permission_id", 'input[name="item_rate_priority"]',
                    "#item_rate_priorityerror", "panel-body-item-details") === false) {
                return false;
            }
            if (validatePriority("#item_price_permission_id", 'input[name="item_price_priority"]',
                    "#item_price_priorityerror", "panel-body-item-details") === false) {
                return false;
            }
            if (validatePriority("#item_discount_permission_id", 'input[name="item_discount_priority"]',
                    "#item_discount_priorityerror", "panel-body-item-details") === false) {
                return false;
            }
            if (validatePriority("#rsp_permission_id", 'input[name="item_rsv_priority"]', "#rsp_priorityerror",
                    "panel-body-item-details") === false) {
                return false;
            }
            toolarrpushvalidatePriorityCheckForOutSide('#item_details_permission_id',
                'input[name="item_details_priority"]');
            //new code ends
        }


        if ($("#other_details_permission_id").is(":checked")) {
            main_arr.push(main);
            main++;
            // new code
            var toolarr = [];
            var checkarr = [];
            var cCount = 0;
            var i = 1;

            if (toolarrpushvalidatePriority("#sub_total_permission_id", 'input[name="sub_total_priority"]') === false) {
                return false;
            }
            if (toolarrpushvalidatePriority("#tax_permission_id", 'input[name="tax_priority"]') === false) {
                return false;
            }
            if (toolarrpushvalidatePriority("#charges_permission_id", 'input[name="charges_priority"]') === false) {
                return false;
            }
            if (toolarrpushvalidatePriority("#discount_permission_id", 'input[name="discount_priority"]') === false) {
                return false;
            }
            if (toolarrpushvalidatePriority("#points_redeemed_permission_id",
                'input[name="points_redeemed_priority"]') === false) {
                return false;
            }
            if (toolarrpushvalidatePriority("#gross_amount_permission_id", 'input[name="gross_amount_priority"]') ===
                false) {
                return false;
            }
            // Validate the checked priority count
            if (cCount < 1) {
                $("#other_details_priorityerror").html('Please check 1 item');
                $("#other_details_priorityerror").addClass('set-erroe-custom');
                return false;
            } else {
                $("#other_details_priorityerror").html('');
                $("#other_details_priorityerror").removeClass('set-erroe-custom');
            }
            if (validatePriority("#sub_total_permission_id", 'input[name="sub_total_priority"]',
                    "#sub_total_priorityerror", "panel-body-other-details") === false) {
                return false;
            }
            if (validatePriority("#tax_permission_id", 'input[name="tax_priority"]', "#tax_priorityerror",
                    "panel-body-other-details") === false) {
                return false;
            }
            if (validatePriority("#charges_permission_id", 'input[name="charges_priority"]', "#charges_priorityerror",
                    "panel-body-other-details") === false) {
                return false;
            }
            if (validatePriority("#discount_permission_id", 'input[name="discount_priority"]',
                    "#discount_priorityerror", "panel-body-other-details") === false) {
                return false;
            }
            if (validatePriority("#points_redeemed_permission_id", 'input[name="points_redeemed_priority"]',
                    "#points_redeemed_priorityerror", "panel-body-other-details") === false) {
                return false;
            }
            if (validatePriority("#gross_amount_permission_id", 'input[name="gross_amount_priority"]',
                    "#gross_amount_priorityerror", "panel-body-other-details") === false) {
                return false;
            }
            toolarrpushvalidatePriorityCheckForOutSide('#other_details_permission_id',
                'input[name="other_details_priority"]');
            //new code ends
        }


        if ($("#payment_details_permission_id").is(":checked")) {
            main_arr.push(main);
            main++;
            // new code
            var toolarr = [];
            var checkarr = [];
            var cCount = 0;
            var i = 1;
            if (parseInt('{{ $merchant->ebill_version }}') == 1) {
                if (toolarrpushvalidatePriority("#netbill_paid_permission_id",
                    'input[name="netbill_paid_priority"]') === false) {
                    return false;
                }
            }
            if (toolarrpushvalidatePriority("#amount_due_permission_id", 'input[name="amount_due_priority"]') ===
                false) {
                return false;
            }
            if (toolarrpushvalidatePriority("#amount_in_words_permission_id",
                'input[name="amount_in_words_priority"]') === false) {
                return false;
            }
            if (toolarrpushvalidatePriority("#roundoff_permission_id", 'input[name="roundoff_priority"]') === false) {
                return false;
            }
            // Validate the checked priority count
            if (cCount < 1 && parseInt('{{ $merchant->ebill_version }}') == 1 || cCount < 1 && parseInt(
                    '{{ $merchant->ebill_version }}') == 2 && $("#netbill_paid_permission_id").is(":not(:checked)")) {
                $("#payment_details_priorityerror").html('Please check 1 item');
                $("#payment_details_priorityerror").addClass('set-erroe-custom');
                return false;
            } else {
                $("#delivery_address_details_priorityerror").html('');
                $("#delivery_address_details_priorityerror").removeClass('set-erroe-custom');
            }
            if (parseInt('{{ $merchant->ebill_version }}') == 1) {
                if (validatePriority("#netbill_paid_permission_id", 'input[name="netbill_paid_priority"]',
                        "#netbill_paid_priorityerror", "panel-body-payment-details") === false) {
                    return false;
                }
            }

            if (validatePriority("#amount_due_permission_id", 'input[name="amount_due_priority"]',
                    "#amount_due_priorityerror", "panel-body-payment-details") === false) {
                return false;
            }

            if (validatePriority("#amount_in_words_permission_id", 'input[name="amount_in_words_priority"]',
                    "#amount_in_words_priorityerror", "panel-body-payment-details") === false) {
                return false;
            }

            if (validatePriority("#roundoff_permission_id", 'input[name="roundoff_priority"]',
                    "#roundoff_priorityerror", "panel-body-payment-details") === false) {
                return false;
            }
            toolarrpushvalidatePriorityCheckForOutSide('#payment_details_permission_id',
                'input[name="payment_details_priority"]');
            //new code end
        }

        if ($("#display_points_summary_permission").is(":checked")) {
            main_arr.push(main);
            main++;
            toolarrpushvalidatePriorityCheckForOutSide('#display_points_summary_permission',
                'input[name="display_point_summary_priority"]');
        }
        if ($("#coupon_details_permission").is(":checked")) {
            main_arr.push(main);
            main++;
            toolarrpushvalidatePriorityCheckForOutSide('#coupon_details_permission',
                'input[name="coupon_details_priority"]');
        }


        if ($("#terms_and_condition_permission_id").is(":checked")) {
            main_arr.push(main);
            main++;
            // new code
            var toolarr = [];
            var checkarr = [];
            var cCount = 0;
            var i = 1;

            if (toolarrpushvalidatePriority("#t_and_c1_permission_id", 'input[name="t_and_c1_priority"]') === false) {
                return false;
            }
            if (toolarrpushvalidatePriority("#t_and_c2_permission_id", 'input[name="t_and_c2_priority"]') === false) {
                return false;
            }
            if (toolarrpushvalidatePriority("#t_and_c3_permission_id", 'input[name="t_and_c3_priority"]') === false) {
                return false;
            }
            if (toolarrpushvalidatePriority("#t_and_c4_permission_id", 'input[name="t_and_c4_priority"]') === false) {
                return false;
            }
            if (toolarrpushvalidatePriority("#t_and_c5_permission_id", 'input[name="t_and_c5_priority"]') === false) {
                return false;
            }

            // Validate the checked priority count
            //if($(".panel-body-delivery-address-details input[type='checkbox']:checked").length < 1)
            if (cCount < 1) {
                $("#terms_and_conditions_priorityerror").html('Please check 1 item');
                $("#terms_and_conditions_priorityerror").addClass('set-erroe-custom');
                return false;
            } else {
                $("#terms_and_conditions_priorityerror").html('');
                $("#terms_and_conditions_priorityerror").removeClass('set-erroe-custom');
            }
            if (validatePriority("#t_and_c1_permission_id", 'input[name="t_and_c1_priority"]',
                    "#t_and_c1_priorityerror", "panel-body-delivery-address-details") === false) {
                return false;
            }
            if (validatePriority("#t_and_c2_permission_id", 'input[name="t_and_c2_priority"]',
                    "#t_and_c2_priorityerror", "panel-body-delivery-address-details") === false) {
                return false;
            }
            if (validatePriority("#t_and_c3_permission_id", 'input[name="t_and_c3_priority"]',
                    "#t_and_c3_priorityerror", "panel-body-delivery-address-details") === false) {
                return false;
            }
            if (validatePriority("#t_and_c4_permission_id", 'input[name="t_and_c4_priority"]',
                    "#t_and_c4_priorityerror", "panel-body-delivery-address-details") === false) {
                return false;
            }
            if (validatePriority("#t_and_c5_permission_id", 'input[name="t_and_c5_priority"]',
                    "#t_and_c5_priorityerror", "panel-body-delivery-address-details") === false) {
                return false;
            }
            toolarrpushvalidatePriorityCheckForOutSide('#terms_and_condition_permission_id',
                'input[name="terms_and_conditions_priority"]');
            //new code ends
        }


        if ($("#ebillupdate_permission_id").is(":checked")) {
            main_arr.push(main);
            main++;
            toolarrpushvalidatePriorityCheckForOutSide('#ebillupdate_permission_id',
                'input[name="ebill_updates_priority"]');
        }



        if ($("#social_link_permission_id").is(":checked")) {
            main_arr.push(main);
            main++;
            toolarrpushvalidatePriorityCheckForOutSide('#social_link_permission_id',
                'input[name="social_link_priority"]');
        }

        // if($("#footnote_permission_id").is(":checked")){
        // 	main_arr.push(main);
        // 	main++;
        // 	toolarrpushvalidatePriorityCheckForOutSide('#footnote_permission_id', 'input[name="footnote_priority"]');
        // }
        //bb
        // if($("#banner_Image_tile1_id").is(":checked")){
        // 	main_arr.push(main);
        // 	main++;
        // 	//toolarrpushvalidatePriorityCheckForOutSide('#banner_Image_tile1_id', 'input[name="dynamic_banner_tile[]"]');
        // }
        // if($("#banner_Image_tile2_id").is(":checked")){
        // 	main_arr.push(main);
        // 	main++;
        // 	//toolarrpushvalidatePriorityCheckForOutSide('#banner_Image_tile2_id', 'input[name="dynamic_banner_tile[]"]');
        // }
        // if($("#banner_Image_tile3_id").is(":checked")){
        // 	main_arr.push(main);
        // 	main++;
        // 	//toolarrpushvalidatePriorityCheckForOutSide('#banner_Image_tile3_id', 'input[name="dynamic_banner_tile[]"]');
        // }
        // if($("#company_details_permission_id").is(":checked")){
        // 	if (validatePriorityCheckForOutSide("#company_details_permission_id", 'input[name="company_details_priority"]', "#company_details_priorityerror") === false) {
        // 		return false;
        // 	}
        // }
        if ($("#Dynamic_banner_permission_id").is(":checked") && vrsn == 2) {
            if ($("#banner_Image_tile1_id").is(":checked")) {
                main_arr.push(main);
                main++;
                toolarrpushvalidatePriorityCheckForOutSide2('#banner_Image_tile1_id', '#dynamic_bill_banner_id1');
            }
            if ($("#banner_Image_tile2_id").is(":checked")) {
                main_arr.push(main);
                main++;
                toolarrpushvalidatePriorityCheckForOutSide2('#banner_Image_tile2_id', '#dynamic_bill_banner_id2');
            }
            if ($("#banner_Image_tile3_id").is(":checked")) {
                main_arr.push(main);
                main++;
                toolarrpushvalidatePriorityCheckForOutSide2('#banner_Image_tile3_id', '#dynamic_bill_banner_id3');
            }
        }

        if ($("#bill_details_permission_id").is(":checked")) {
            if (validatePriorityCheckForOutSide("#bill_details_permission_id", 'input[name="bill_details_priority"]',
                    "#bill_details_priorityerror") === false) {
                return false;
            }
        }
        if ($("#delivery_address_details_permission_id").is(":checked")) {
            if (validatePriorityCheckForOutSide("#delivery_address_details_permission_id",
                    'input[name="delivery_address_details_priority"]', "#delivery_address_details_priorityerror") ===
                false) {
                return false;
            }
        }
        if ($("#item_details_permission_id").is(":checked")) {
            if (validatePriorityCheckForOutSide("#item_details_permission_id", 'input[name="item_details_priority"]',
                    "#item_details_priorityerror") === false) {
                return false;
            }
        }
        if ($("#other_details_permission_id").is(":checked")) {
            if (validatePriorityCheckForOutSide("#other_details_permission_id", 'input[name="other_details_priority"]',
                    "#other_details_priorityerror") === false) {
                return false;
            }
        }
        if ($("#ebillupdate_permission_id").is(":checked")) {
            if (validatePriorityCheckForOutSide("#ebillupdate_permission_id", 'input[name="ebill_updates_priority"]',
                    "#ebill_updates_priority_priorityerror") === false) {
                return false;
            }
        }
        if ($("#payment_details_permission_id").is(":checked")) {
            if (validatePriorityCheckForOutSide("#payment_details_permission_id",
                    'input[name="payment_details_priority"]', "#payment_details_priorityerror") === false) {
                return false;
            }
        }
        if ($("#terms_and_condition_permission_id").is(":checked")) {
            if (validatePriorityCheckForOutSide("#terms_and_condition_permission_id",
                    'input[name="terms_and_conditions_priority"]', "#terms_and_conditions_priorityerror") === false) {
                return false;
            }
        }
        if ($("#display_points_summary_permission").is(":checked")) {
            if (validatePriorityCheckForOutSide("#display_points_summary_permission",
                    'input[name="display_point_summary_priority"]', "#display_point_summary_priorityerror") === false) {
                return false;
            }
        }
        if ($("#coupon_details_permission").is(":checked")) {
            if (validatePriorityCheckForOutSide("#coupon_details_permission", 'input[name="coupon_details_priority"]',
                    "#coupon_details_priorityerror") === false) {
                return false;
            }
        }
        if ($("#social_link_permission_id").is(":checked")) {
            if (validatePriorityCheckForOutSide("#social_link_permission_id", 'input[name="social_link_priority"]',
                    "#social_link_priorityerror") === false) {
                return false;
            }
        }


        if ($("#Dynamic_banner_permission_id").is(":checked") && vrsn == 2) {

            if ($("#banner_Image_tile1_id").is(":checked")) {
                if (validatePriorityCheckForOutSide2("#banner_Image_tile1_id", '#dynamic_bill_banner_id1',
                        "#dynamic_banner_tile1_priorityerror") === false) {
                    return false;
                }
                // toolarrpushvalidatePriorityCheckForOutSide2('#banner_Image_tile1_id', '#dynamic_bill_banner_id1');
            }
            if ($("#banner_Image_tile2_id").is(":checked")) {
                if (validatePriorityCheckForOutSide2("#banner_Image_tile2_id", '#dynamic_bill_banner_id2',
                        "#dynamic_banner_tile2_priorityerror") === false) {
                    return false;
                }
                // toolarrpushvalidatePriorityCheckForOutSide2('#banner_Image_tile2_id', '#dynamic_bill_banner_id2');
            }
            if ($("#banner_Image_tile3_id").is(":checked")) {
                if (validatePriorityCheckForOutSide2("#banner_Image_tile3_id", '#dynamic_bill_banner_id3',
                        "#dynamic_banner_tile3_priorityerror") === false) {
                    return false;
                }
                //toolarrpushvalidatePriorityCheckForOutSide2('#banner_Image_tile3_id', '#dynamic_bill_banner_id3');
            }
        }
        return true;
    }
    $('.clearimage').click(function() {
        $(this).hide();
        if ($('#logo_image_size').val() == 1) {
            $('#addpushimage_43').html('Add Image');
            $('#addbannererror_43').html('');
            $('input[name=logo_image_43]').val('');
            $('#blah_add_banneradd_43').attr('src', "{{ asset('images/icon/Icons-01.png') }}");
        } else {
            $('#addpushimage_51').html('Add Image');
            $('#addbannererror_51').html('');
            $('input[name=logo_image_51]').val('');
            $('#blah_add_banneradd_51').attr('src', "{{ asset('images/icon/Icons-01.png') }}");
        }
        $('#ebill_structure_submit_id').attr('disabled', false);
        $('#save_apply').attr('disabled', false);
    });

    function read_add_banner_URLadd(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                if (input.id == "logo_image_id_43") {
                    $('#blah_add_banneradd_43').attr('src', e.target.result);
                } else {
                    $('#blah_add_banneradd_51').attr('src', e.target.result);
                }
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#logo_image_id_43").change(function() {
        read_add_banner_URLadd(this);
    });

    $("#logo_image_id_51").change(function() {
        read_add_banner_URLadd(this);
    });


    $(document).on("click", "#add_bill_banner", function() {
        $("#myModal_addbanner").modal("show");
        $('#add_banner_submit_id').attr("disabled", false);
    });

    var _URL_set = window.URL || window.webkitURL;
    $("input[name=banner_image_set]").change(function(e) {
        // $('#addbannersubmit').attr('disabled',false);
        $('#addbannererror_modal').html('');
        var banner_image = $('input[name=banner_image_set]').val();
        if (banner_image) {
            $('.clearimage_set').show();
            $('#addpushimage_set').html('Change Image');
            if (!banner_image.match(/(?:jpg|png|jpeg|JPEG|PNG|JPG)$/)) {
                $('#addbannererror_modal').html("This file format is not accepted");
                // $('#addbannersubmit').attr('disabled','disabled');
            } else {
                // alert($('#logo_image_size').val());
                if ($('#logo_image_size').val() == 1) {

                }
                var file, img;
                if ((file = this.files[0])) {
                    img = new Image();
                    img.onload = function() {
                        var ratio = 320 / 240;
                        var imageratio = (this.width) / (this.height);
                        if (ratio.toFixed(1) == imageratio.toFixed(1)) {
                            //if(imageratio > 1){
                            var iSize = ($('input[name=banner_image_set]')[0].files[0].size / 1024);
                            iSize = (Math.round(iSize * 100) / 100);
                            if (iSize <= 50) {
                                $('#add_banner_submit_id').attr('disabled', false);
                            } else {
                                $('#addbannererror_modal').html(
                                    'Maximum File size should be 50 KB. Your file size is ' + iSize +
                                    ' KB');
                                $('#add_banner_submit_id').attr('disabled', 'disabled');
                            }
                        } else {
                            $('#addbannererror_modal').html('Image Ratio Should be Exact 4 : 3.');
                            $('#add_banner_submit_id').attr('disabled', 'disabled');
                        }
                    };
                    img.src = _URL_set.createObjectURL(file);
                    $('#blah_add_banneradd_set').attr('src', _URL_set.createObjectURL(file));
                }
            }
        } else {
            $('.clearimage_set').hide();
            $('#addpushimage_set').html('Add Image');
            $('#blah_add_banneradd_set').attr('src', "{{ asset('images/icon/Icons-01.png') }}");
        }
    });

    $('.clearimage_set').click(function() {
        $(this).hide();
        $('#addpushimage_set').html('Add Image');
        $('#addbannererror_set').html('');
        $('input[name=banner_image_set]').val('');
        $('#blah_add_banneradd_set').attr('src', "{{ asset('images/icon/Icons-01.png') }}");
        $('#add_banner_submit_id').attr('disabled', false);
        $('#addbannererror_modal').html('');
    });

    //bb
    $(document).on("click", "#dynamic_bill_banner", function() {
        dynamic_bnr_dttbl = $(this).closest('home-table').find("#dynamic_banner_table_id");
        //alert(dynamic_bnr_dttbl);
        var bnnrttl = $(this).data('id');
        $('#banner_tile').val($(this).data('id'));
        var layout = $(this).closest('.home-table').find('#dynamic_banner_layout');
        var bnnr_layout = $(this).closest('.home-table').find('#dynamic_banner_layout').val();
        var b_count = $(this).parent().children('.clbnrimg').index(this);
        if ($('#Dynamic_banner_permission_id').prop('checked') == true) {
            $('#dynamic_banner_permsn').val(1);
        } else {
            $('#dynamic_banner_permsn').val(0);
        }
        if (bnnr_layout != 0 && bnnr_layout != "") {
            if (bnnr_layout == "Double Banner-single Tile") {
                $('#tile_banner_layout').val(2);
                $('.img_dyn_bnr_rto').html("4:3");
                $('.bnr_dia').html("640X480");
            } else {
                $('#tile_banner_layout').val(1);
                $('.img_dyn_bnr_rto').html("5:2");
                $('.bnr_dia').html("500X200");
            }
            //alert($(this).data('id'));
            //$('#banner_tile').val($(this).data('id'));
            $("#myModal_dynamicbanner").modal("show");
            $('#add_dynamic_banner_submit_id').attr("disabled", false);
        } else {
            var popup = document.createElement("div");
            var popup_div = document.createElement("div");
            popup.className = "popup";
            popup_div.className = "popup_div";

            var heading = document.createElement("h2");
            heading.innerHTML = "Select Banner Layout";
            popup.appendChild(heading);

            var closeButton = document.createElement("span");
            closeButton.innerHTML = "×";
            closeButton.addEventListener("click", function() {
                popup.remove();
                popup_div.remove();
            });
            popup.appendChild(closeButton);

            // var BannerSep3 = document.createElement("hr");
            // popup.appendChild(BannerSep3);

            var singleBannerRadio = document.createElement("input");
            singleBannerRadio.type = "radio";
            singleBannerRadio.name = "bannerType";
            singleBannerRadio.value = "single";
            singleBannerRadio.id = "single_banner";
            var singleBannerLabel = document.createElement("label");
            singleBannerLabel.innerHTML = "Single Banner- single Tile";
            singleBannerLabel.setAttribute("for", "single_banner");
            singleBannerLabel.setAttribute("background", "blue");

            var BannerSep1 = document.createElement("br");
            var BannerSep01 = document.createElement("br");

            var doubleBannerRadio = document.createElement("input");
            doubleBannerRadio.type = "radio";
            doubleBannerRadio.name = "bannerType";
            doubleBannerRadio.value = "double";
            doubleBannerRadio.id = "double_banner";
            var doubleBannerLabel = document.createElement("label");
            doubleBannerLabel.innerHTML = "Double Banner-single Tile";
            doubleBannerLabel.setAttribute("for", "double_banner");

            var hiddenBannerTypeInput = document.createElement("input");
            hiddenBannerTypeInput.type = "hidden";
            hiddenBannerTypeInput.name = "banner_type";
            var BannerSep2 = document.createElement("hr");

            popup.appendChild(singleBannerRadio);
            popup.appendChild(singleBannerLabel);
            popup.appendChild(BannerSep1);
            popup.appendChild(BannerSep01);
            popup.appendChild(doubleBannerRadio);
            popup.appendChild(doubleBannerLabel);

            popup.appendChild(hiddenBannerTypeInput);
            popup.appendChild(BannerSep2);
            var saveButton = document.createElement("button");
            saveButton.innerHTML = "Submit";
            saveButton.addEventListener("click", function() {

                var selectedBannerType = document.querySelector('input[name="bannerType"]:checked')
                    .value;

                hiddenBannerTypeInput.value = selectedBannerType;

                if (selectedBannerType === "single") {
                    //console.log("Single Banner selected. Save logic for single banner.");
                    $(layout).val("Single Banner- single Tile").removeClass('none');;
                    //alert("Not allowed");
                    //$('#banner_tile').val($(this).data('id'));
                    $('#tile_banner_layout').val(1);
                    $('.img_dyn_bnr_rto').html("5:2");
                    $('.bnr_dia').html("500X200");
                    $("#myModal_dynamicbanner").modal("show");
                    $('#add_dynamic_banner_submit_id').attr("disabled", false);
                } else if (selectedBannerType === "double") {
                    $(layout).val("Double Banner-single Tile").removeClass('none');
                    //console.log("Double Banner selected. Save logic for double banner.");
                    //$('#banner_tile').val($(this).data('id'));
                    $('#tile_banner_layout').val(2);
                    $('.img_dyn_bnr_rto').html("4:3");
                    $('.bnr_dia').html("640X480");
                    $("#myModal_dynamicbanner").modal("show");
                    $('#add_dynamic_banner_submit_id').attr("disabled", false);
                }
                // alert(bnnrttl);
                // $('#banner_tile').val(bnnrttl);
                // alert($('#banner_tile').val());

                popup.remove();
                popup_div.remove();
            });

            popup.appendChild(saveButton);

            document.body.appendChild(popup);
            document.body.appendChild(popup_div);
            //popup.remove();
        }
        //alert(bnnrttl);
        //$('#banner_tile').val(bnnrttl);
    });

    var _URL_set = window.URL || window.webkitURL;
    $("input[name=dynamic_banner_image_set]").change(function(e) {
        //alert($('#tile_banner_layout').val());
        $('#dynamic_bannererror_modal_image').html('');
        var banner_image = $('input[name=dynamic_banner_image_set]').val();
        if (banner_image) {
            $('.dynamic_clearimage_set').show();
            $('#adddynamicimage_set').html('Change Image');
            if (!banner_image.match(/(?:jpg|png|jpeg|JPEG|PNG|JPG)$/)) {
                $('#dynamic_bannererror_modal_image').html("This file format is not accepted");
            } else {
                var file, img;
                if ((file = this.files[0])) {
                    img = new Image();
                    img.onload = function() {
                        var ratio = 0;
                        if ($('#tile_banner_layout').val() == 2) {
                            ratio = 320 / 240;
                        } else {
                            ratio = 500 / 200;
                        }
                        //alert(ratio);
                        // var ratio = 320/240;

                        //var ratio = 1.39;
                        var imageratio = (this.width) / (this.height);
                        if (ratio.toFixed(1) == imageratio.toFixed(1)) {
                            //if(imageratio > 1){		
                            var iSize = ($('input[name=dynamic_banner_image_set]')[0].files[0].size / 1024);
                            iSize = (Math.round(iSize * 100) / 100);
                            if (iSize <= 50) {
                                $('#add_dynamic_banner_submit_id').attr('disabled', false);
                            } else {
                                $('#dynamic_bannererror_modal_image').html(
                                    'Maximum File size should be 50 KB. Your file size is ' + iSize +
                                    ' KB');
                                $('#add_dynamic_banner_submit_id').attr('disabled', 'disabled');
                            }
                        } else {
                            if ($('#tile_banner_layout').val() == 2) {
                                $('#dynamic_bannererror_modal_image').html(
                                    'Image Ratio Should be Exact 4 : 3.');
                            } else {
                                $('#dynamic_bannererror_modal_image').html(
                                    'Image Ratio Should be Exact 5 : 2.');
                            }
                            $('#add_dynamic_banner_submit_id').attr('disabled', 'disabled');
                        }
                    };
                    img.src = _URL_set.createObjectURL(file);
                    $('#dynamic_add_banneradd_set').attr('src', _URL_set.createObjectURL(file));
                }
            }
        } else {
            $('.dynamic_clearimage_set').hide();
            $('#adddynamicimage_set').html('Add Image');
            $('#dynamic_add_banneradd_set').attr('src', "{{ asset('images/icon/Icons-01.png') }}");
        }
    });


    $('.dynamic_clearimage_set').click(function() {
        $(this).hide();
        $('#adddynamicimage_set').html('Add Image');
        $('#addbannererror_set').html('');
        $('input[name=dynamic_banner_image_set]').val('');
        $('#dynamic_add_banneradd_set').attr('src', "{{ asset('images/icon/Icons-01.png') }}");
        $('#add_dynamic_banner_submit_id').attr('disabled', false);
        $('#addbannererror_modal_image').html('');
    });


    function read_add_banner_URLadd_set(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#blah_add_banneradd_set').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp_add_banneradd_set").change(function() {
        read_add_banner_URLadd_set(this);
    });
    //bb
    function read_add_banner_URLadd_set(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#dynamic_imgInp_add_banneradd_set').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#dynamic_imgInp_add_banneradd_set").change(function() {
        read_add_banner_URLadd_set(this);
    });

    // $("#dynamic_imgInp_edit_banneradd_set").change(function() {
    // 	read_edit_banner_URLadd_set(this);
    // });

    // function read_edit_banner_URLadd_set(input) {
    // 	alert(this);
    // 	if (input.files && input.files[0]) {
    // 		var reader = new FileReader();
    // 		reader.onload = function(e) {
    //   			$('#dynamic_edit_banneradd_set').attr('src', e.target.result);
    // 		}
    // 		reader.readAsDataURL(input.files[0]);
    // 	}
    // }

    function dynamicbannerchk() {
        var ret = 0;
        if ($('#Dynamic_banner_permission_id').prop('checked') == true) {
            if ($('.clchkprmsn:checked').length == 0) {
                ret = ret + 1;
                swal({
                    title: "Success",
                    text: "Dynamic banner is required",
                    timer: 2500
                });
                //alert("Atleast one banner tile to be need ");
            };
            $('.panel-body_remove').each(function() {
                $(this).find('#dynamic_banner_table_id').each(function() {

                    if ($(this).closest('.panel-body_remove').find('.clchkprmsn').prop("checked")
                        .length == 0) {
                        $(this).closest('.panel-body_remove').find('#dynamic_banner_permissionerror')
                            .text("Atleast one banner needed for this tile");
                        ret = ret + 1;
                        console.log("error - 1");
                    } else {
                        $(this).closest('.panel-body_remove').find('#dynamic_banner_permissionerror')
                            .text("");
                    }
                    var vl = $(this).closest('.panel-body_remove').find('#dynamic_banner_layout')
                    .val() == "Single Banner- single Tile" ? 1 : $(this).closest('.panel-body_remove')
                        .find('#dynamic_banner_layout').val() == "Double Banner-single Tile" ? 2 : 0;
                    // console.log(vl);
                    if ($(this).closest('.panel-body_remove').find('.clchkprmsn').prop("checked") ==
                        true) {
                        if (vl == 1) {
                            if ($(this).find('.dataTables_empty').length > 0 || $(this).find('tbody')
                                .find('tr').length == 0) {
                                //alert($(this).find('.dataTables_empty').length);
                                //alert($(this).find('tbody').find('tr').length);
                                $(this).closest('.panel-body_remove').find(
                                    '#dynamic_banner_permissionerror').text(
                                    "Atleast one banner needed for this tile");
                                $(this).closest('.panel-body_remove').find('#dynamic_bill_banner')
                                    .focus();
                                ret = ret + 1;
                                console.log("error - 2");
                            } else {
                                $(this).closest('.panel-body_remove').find(
                                    '#dynamic_banner_permissionerror').text("");
                            }
                        } else if (vl == 2) {
                            if ($(this).find('.dataTables_empty').length > 0 || $(this).find('tbody')
                                .find('tr').length == 0 || $(this).find('tbody').find('tr').length < 2
                                ) {
                                //alert($(this).find('.dataTables_empty').length);
                                //alert($(this).find('tbody').find('tr').length);
                                $(this).closest('.panel-body_remove').find(
                                    '#dynamic_banner_permissionerror').text(
                                    "Atleast two banner needed for this tile");
                                $(this).closest('.panel-body_remove').find('#dynamic_bill_banner')
                                    .focus();
                                ret = ret + 1;
                                console.log("error - 3");
                            } else {
                                $(this).closest('.panel-body_remove').find(
                                    '#dynamic_banner_permissionerror').text("");
                            }
                        } else {
                            if ($(this).find('.dataTables_empty').length > 0 || $(this).find('tbody')
                                .find('tr').length == 0 || $(this).find('tbody').find('tr').length < 1
                                ) {
                                //alert($(this).find('.dataTables_empty').length);
                                //alert($(this).find('tbody').find('tr').length);
                                $(this).closest('.panel-body_remove').find(
                                    '#dynamic_banner_permissionerror').text(
                                    "Banner needed for this tile");
                                $(this).closest('.panel-body_remove').find('#dynamic_bill_banner')
                                    .focus();
                                ret = ret + 1;
                                console.log("error - 3");
                            } else {
                                $(this).closest('.panel-body_remove').find(
                                    '#dynamic_banner_permissionerror').text("");
                            }
                        }
                    }
                });
            });
        }
        // console.log(ret);
        return ret;
    }

    function Linkchk(lnk) {
        if ($(lnk).closest('.dv_Lnk').find('[type=checkbox]').prop('checked') == true && $('#toolbar_permission_id')
            .prop('checked') == true) {
            //alert("ok");
            var myVariable = $(lnk).val().trim();
            //alert(myVariable);
            if (/^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/
                .test(myVariable)) {
                //alert(myVariable);
                // $('#home_linkerror').html("");
                // $('#login_linkerror').html("");
                // $('#menu_linkerror').html("");
            } else {
                //alert(myVariable);
                if ($(lnk).prop('name') == 'home_link') {
                    //alert(myVariable)
                    $('#home_linkerror').html("Link  is not in the  correct format");
                    $(lnk).focus();
                }
                if ($(lnk).prop('name') == 'login_link') {
                    //alert(myVariable)
                    $('#login_linkerror').html("Link  is not in the  correct format");
                    $(lnk).focus();
                }
                if ($(lnk).prop('name') == 'menu_link') {
                    //alert(myVariable)
                    $('#menu_linkerror').html("Link  is not in the  correct format");
                    $(lnk).focus();
                }
                if ($(lnk).prop('name') == 'website_link') {
                    //alert(myVariable)
                    $('#website_linkerror').html("Link  is not in the  correct format");
                    $(lnk).focus();
                }

                return false;
            }
        }
    }

    $('#ebill_structure_id').on('submit', function(event) {
        event.preventDefault();
        var eventcheck = validation(event);
        var priocheck = validationColumnPriyo();
        var dynbnrchk = dynamicbannerchk();
        // console.log(eventcheck,priocheck,dynbnrchk);
        //alert(dynbnrchk);
        // numlength(e);
        if ($('#Dynamic_banner_permission_id').prop('checked') == true) {
            if ($('.panel-body_remove').length == 0) {
                swal({
                    title: "Success",
                    text: "Dynamic banner is required",
                    timer: 2500
                });
                return false;
            }
        }

        var cmpchk = fnCompanyDtls();
        if (cmpchk == 0) {
            $("#sp_comp_dtls_error").html("Atleast one value need for company details.");
            //alert("Atleast one value need for company details.");
            return false;
        } else {
            $("#sp_comp_dtls_error").html("");
        }

        var chk = 0;
        $('.clLink').each(function() {
            var lnkhk = Linkchk(this);
            //alert(lnkhk)
            if (lnkhk == false) {
                chk = chk + 1;
                //return false;
            }
        });
        if (chk != 0) {
            return false;
        }
        // else{
        // 	$('#home_linkerror').html("");
        // 	$('#login_linkerror').html("");
        // 	$('#menu_linkerror').html("");
        // }

        if (eventcheck == true && priocheck == true && dynbnrchk == 0) {
            var form = $('#ebill_structure_id')[0];
            var data = new FormData(form);
            $.ajax({
                url: "{{ url('add/ebill/structure') }}",
                type: 'POST',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function(data) {
                    if (data.error == false) {
                        swal({
                            title: "Success",
                            text: data.success,
                            timer: 2500
                        });
                        setTimeout(function() {
                            window.location.replace("{{ url('list_outlet_ebill') }}");
                        }, 3000);
                    } else {
                        var msg = data.success;
                        $('#ebill_output_id').html(msg);
                    }
                }
            });
            console.log(data);
        }
        if ($('#company_number_permission_id').is(':checked')) {
            if ($('#company_country_code').val() == 91 && $('#company_number').val().length < 10) {
                $('#company_numbererror').text("Number must be 10 digits.");
                $('#company_number').focus();
                return false;
            }
        }
    });

    $("#company_name_permission_id").click(function() {
        fnCompanyDtls();
        var cmpchkd = fnCompanyDtls();
        //alert(dynbnrchk);
        if (cmpchkd == 0) {
            $("#sp_comp_dtls_error").html("Atleast one value need for company details.");
        } else {
            $("#sp_comp_dtls_error").html("");
        }
    });

    function fnCompanyDtls() {
        var chkdcom = 0;
        $(".clcmpdtls").each(function() {
            if ($(this).prop("checked") == true) {
                chkdcom = chkdcom + 1;
            }
        });
        if ($("#company_name_permission_id").prop("checked") == true) {
            chkdcom = chkdcom + 1;
        }
        return chkdcom;
    }

    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        } else {
            return true;
        }
    }


    $('#add_banner_submit_id').on('click', function(event) {
        var eventcheck = banner_validation(event);
        //alert(eventcheck);
        if ($('#banner_link_id').val().trim() != "") {
            var myVariable = $('#banner_link_id').val().trim();
            var urlPattern = /^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,})([\/\w \.-]*)*\/?$/;
            if (urlPattern.test(myVariable)) {
                //alert("valid url");
                $('#edit_banner_output_id').text("");
            } else {
                // swal({
                // 	title: "Success",
                // 	text: "Link is not correct format",
                // 	timer: 2500
                // });
                //alert("valid url");
                $('#addbannererror_modal').text("Link  is not in the  correct format");
                return false;
            }
        }
        $('#add_banner_submit_id').attr("disabled", true);
        event.preventDefault();
        if (eventcheck == true) {
            //alert("ok");
            var form = $('#add_banner_form_id')[0];
            var data = new FormData(form);
            console.log(data);
            $.ajax({
                url: '{{ url('add/banner') }}',
                type: 'POST',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                success: function(data) {
                    if (data.error == false) {
                        $('#blah_add_banneradd_set').attr('src',
                            "{{ asset('images/icon/Icons-01.png') }}");
                        $('.clearimage_set').hide();
                        $('#addpushimage_set').html('Add Image');
                        $('#add_banner_output_id').html('');
                        $('#myModal_addbanner').modal('hide');
                        $('#addbannererror_modal').html("");
                        $('#banner_table_id').DataTable().ajax.reload();
                        swal({
                            title: "Success",
                            text: data.success,
                            timer: 2500
                        });
                    } else {
                        var msg = data.success;
                        $('#add_banner_output_id').html(msg);
                    }
                    $('#add_banner_submit_id').attr("disabled", false);
                }
            });
            //console.log(data);
            var outletid = $('#outlet_id').val();
            $('#banner_table_id').DataTable({
                destroy: true,
                processing: true,
                serverSide: true,
                responsive: true,
                "ordering": false,
                ajax: {
                    url: "{{ url('datatable/banner_list') }}",
                    data: {
                        'outletid': outletid
                    }
                },
                "columnDefs": [{
                        "width": "20%",
                        "targets": 0
                    },
                    {
                        "width": "20%",
                        "targets": 1
                    },
                    {
                        "width": "30%",
                        "targets": 2
                    },
                    {
                        "width": "20%",
                        "targets": 3
                    },
                    {
                        "width": "10%",
                        "targets": 4
                    }
                ],
                columns: [

                    {
                        data: 'banner_image',
                        name: 'wl_outlet_banner.banner_image',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, full, meta) {
                            // console.log(data.id)
                            if (data != '')
                                return '<img src="' + data +
                                    '" style="width:70px !important; height:70px !important;margin: 0px auto;display: block;">';
                        }
                    },
                    {
                        data: 'banner_priority',
                        name: 'wl_outlet_banner.banner_priority'
                    },
                    {
                        data: 'banner_link',
                        name: 'wl_outlet_banner.banner_link'
                    },
                    {
                        data: {
                            id: 'id',
                            status: 'status'
                        },
                        orderable: false,
                        searchable: false,
                        render: function(data, type, full, meta) {
                            // console.log(data.status);
                            return '' + ((data.status == 2) ?
                                '<h6 style="color:green;">Saved & Applied</h6>' :
                                '<h6 style="color:red;">Saved & Not Applied</h6>') + '';
                        }
                    },
                    {
                        data: 'id',
                        name: 'wl_outlet_banner.id',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, full, meta) {
                            return '<a href="javascript:void(0)" class="editbanner" data-id="' +
                                data +
                                '">Edit</a> | <a href="javascript:void(0)" style="color: red !important;" class="deletebanner" data-id="' +
                                data + '">Delete</a>';
                        }
                    },


                ],
            });
            // $('#banner_table_id').DataTable().ajax.reload();
        }
    });



    $(document).on('click', '.editbanner', function(e) {
        var id = $(this).data('id');
        var area = 'edit_banner_modal';
        SendEditDetails(area, id)
    });

    function SendEditDetails(area, id) {
        $.ajax({
            type: 'post',
            url: '{{ url('edit/banner') }}',
            data: {
                area: area,
                id: id,
                '_token': $('input[name=_token]').val()
            },
            dataType: 'json',
            success: function(data) {
                if (data.error == false) {
                    $('.contentforedit').empty();
                    // $('.editbannerimage').attr('src',data.image);
                    if (data.message == "banner_edit") {
                        $('#editdiv_all_id').removeClass('modal-dialog-menu-food');
                        $('#EditModalForAll').modal('show');
                        $('.modal-titleforEdit').html('Edit Banner Image');
                        $('.contentforedit').append(
                            '<form style="margin:0px;" id="update_banner_form_id" autocomplete="off"><span class="category-error" id="edit_banner_output_id"></span>{{ csrf_field() }}<div class="modal-body no-padding"><div class="col-md-12 no-padding"><div class="main-upload"><div class="col-md-3"><label class="newbtn"><img id="blah_edit_banneradd_set" class="editbannerimage" src="' +
                            data.image +
                            '"><input onchange="read_edit_banner_URLadd_set(this);" type="file" name="banner_image_edit"  value="' +
                            data.image +
                            '"><p id="addpushimage_set_edit" class="edtimg">Add Image*</p></label><h4 class="clearimage_set_edit" style="display: none;">x</h4></div><div class="col-md-7"><div class="file-cont"><p>Max size allowed: <span>50 KB</span></p><p>Accepted Format: <span>JPEG, PNG</span></p><p>Image Ratio: <span class="img_rto">4 : 3</span></p><p>Suggested Dimensions: <span>640x480</span></p></div></div><div class="clearfix"></div><span class="category-error" id="addbannererror_edit"></span></div></div><div class="clearfix"></div><div class="col-md-12 add-outlet no-padding"><div class="sub-add-outlet"><div class="col-md-6"><p>Priority*</p><input type="hidden" name="banner_id" value="' +
                            data.id +
                            '"><input type="text" id="addbannpriority" class="form-control" name="edit_banner_priority" value="' +
                            data.priority +
                            '" onkeypress="return isNumberKey(event);" inputmode="numeric" pattern="[0-9]*" maxlength="5" placeholder="Priority" /><span class="rederror" id="addbannerpriorityerror"></span></div><div class="col-md-6"><p>Link</p><input type="text" maxlength="100" class="form-control" placeholder="Your Link" name="banner_link" value="' +
                            data.link +
                            '" ></div><div class="clearfix"></div></div><div class="sub-add-outlet"><button id="update_banner_submit_id" type="button">Update</button></div></div><div class="clearfix"></div></div></form>'
                            );

                        if (data.image != "") {
                            //document.getElementByClass("edtimg").html('Change Image');
                            $(".edtimg").html('Change Image');
                        }

                        $('#update_banner_submit_id').on('click', function(event) {
                            if ($('input[name=banner_link]').val().trim() != "") {
                                var myVariable = $('input[name=banner_link]').val().trim();
                                var urlPattern =
                                    /^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,})([\/\w \.-]*)*\/?$/;
                                if (urlPattern.test(myVariable)) {
                                    //alert("valid url");
                                    $('#edit_banner_output_id').text("");
                                } else {
                                    // swal({
                                    // 	title: "Success",
                                    // 	text: "Link is not correct format",
                                    // 	timer: 2500
                                    // });
                                    $('#edit_banner_output_id').text(
                                        "Link  is not in the  correct format");
                                    $('#update_banner_submit_id').attr("disabled", false);
                                    return false;
                                }
                            }
                            $('#update_banner_submit_id').attr("disabled", true);
                            var eventcheck = edit_banner_validation(event);
                            if (eventcheck == true) {
                                var form = $('#update_banner_form_id')[0];
                                var data = new FormData(form);
                                $.ajax({
                                    url: '{{ url('update/banner') }}',
                                    type: 'POST',
                                    data: data,
                                    processData: false,
                                    contentType: false,
                                    cache: false,
                                    success: function(data) {
                                        if (data.error == false) {
                                            $('#EditModalForAll').modal('hide');
                                            swal({
                                                title: "Success",
                                                text: data.success,
                                                timer: 2500
                                            });
                                            setTimeout(function() {
                                                window.location.reload();
                                            }, 3000);
                                        } else {
                                            var msg = data.success;
                                            $('#edit_banner_output_id').html(msg);
                                        }
                                        $('#update_banner_submit_id').attr("disabled",
                                            false);
                                    }
                                });
                                console.log(data);
                                event.preventDefault();
                            }
                        });

                        var _URL_set = window.URL || window.webkitURL;
                        $("input[name=banner_image_edit]").change(function(e) {
                            // $('#addbannersubmit').attr('disabled',false);
                            $('#addbannererror_edit').html('');
                            var banner_image = $('input[name=banner_image_edit]').val();
                            if (banner_image) {
                                $('.clearimage_set_edit').show();
                                $('#addpushimage_set_edit').html('Change Image');
                                if (!banner_image.match(/(?:jpg|png|jpeg|JPEG|PNG|JPG)$/)) {
                                    $('#addbannererror_edit').html(
                                        "This file format is not accepted");
                                    // $('#addbannersubmit').attr('disabled','disabled');
                                } else {
                                    var file, img;
                                    if ((file = this.files[0])) {
                                        img = new Image();
                                        img.onload = function() {
                                            var ratio = 320 / 240;
                                            var imageratio = (this.width) / (this.height);
                                            if (ratio.toFixed(1) == imageratio.toFixed(1)) {
                                                var iSize = ($('input[name=banner_image_edit]')[
                                                    0].files[0].size / 1024);
                                                iSize = (Math.round(iSize * 100) / 100);
                                                if (iSize <= 50) {
                                                    $('#update_banner_submit_id').attr(
                                                        'disabled', false);
                                                } else {
                                                    $('#addbannererror_edit').html(
                                                        'Maximum File size should be 50 KB. Your file size is ' +
                                                        iSize + ' KB');
                                                    $('#update_banner_submit_id').attr(
                                                        'disabled', 'disabled');
                                                }
                                            } else {
                                                $('#addbannererror_edit').html(
                                                    'Image Ratio Should be Exact 4 : 3.');
                                                $('#update_banner_submit_id').attr('disabled',
                                                    'disabled');
                                            }
                                        };
                                        img.src = _URL_set.createObjectURL(file);
                                        $('#blah_edit_banneradd_set').attr('src', _URL_set
                                            .createObjectURL(file));
                                        $('#addpushimage_set_edit').html('Change Image');
                                    }
                                }
                            } else {
                                $('.clearimage_set_edit').hide();
                                $('#addpushimage_set_edit').html('Add Image*');
                                $('#blah_edit_banneradd_set').attr('src',
                                    "{{ asset('images/icon/Icons-01.png') }}");
                            }
                        });

                        $('.clearimage_set_edit').click(function() {
                            $(this).hide();
                            $('#addpushimage_set_edit').html('Add Image*');
                            $('input[name=banner_image_edit]').val('');
                            $('#blah_edit_banneradd_set').attr('src',
                                "{{ asset('images/icon/Icons-01.png') }}");
                            $('#update_banner_submit_id').attr('disabled', false);
                            $('#addbannererror_edit').html('');
                        });

                        function edit_banner_validation() {

                            var elem = document.getElementById('blah_edit_banneradd_set');
                            if (elem.getAttribute('src') == "{{ asset('images/icon/Icons-01.png') }}") {
                                $('input[name=banner_image_edit]').focus();
                                $('#addbannererror_edit').html('Please add an Image');
                                return false;
                            }
                            return true;
                        }
                    }
                }
            }
        });
    }

    // ajax delete for subcategory 
    $(document).on('click', '.deletebanner', function(e) {
        var xx = $(this);
        var id = $(this).data('id');
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this Banner",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: 'post',
                    url: "{{ url('banner/delete') }}",
                    data: {
                        "id": id,
                        '_token': $('input[name=_token]').val()
                    },
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        if (data.error == false) {
                            //alert("ok");
                            swal({
                                text: data.message,
                                type: "success"
                            }).then(function() {
                                // location.reload(); 
                                //$('#banner_table_id').DataTable().ajax.reload();
                                //Dttblbind();
                                $('#banner_table_id').DataTable().ajax.reload();
                                //$(xx).closest('tr').remove();
                            });
                        } else {
                            swal({
                                text: data.message,
                                type: "success"
                            }).then(function() {
                                // location.reload();
                                $('#banner_table_id').DataTable().ajax.reload();
                            });
                        }
                    }
                });
            }
        });
    });

    $('.clcmpdtls').click(function() {
        var cmpchkd = fnCompanyDtls();
        //alert(dynbnrchk);
        if (cmpchkd == 0) {
            $("#sp_comp_dtls_error").html("Atleast one value need for company details.");
        } else {
            $("#sp_comp_dtls_error").html("");
        }
    });

    $(document).on("click", "#save_apply", function(event) {
        event.preventDefault();
        var eventcheck = validation(event);
        var priocheck = validationColumnPriyo();
        var dynbnrchk = dynamicbannerchk();
        var cmpchkd = fnCompanyDtls();
        // alert(cmpchkd);
        // return false;
        if (cmpchkd == 0) {
            $("#sp_comp_dtls_error").html("Atleast one value need for company details.");
            return false;
        } else {
            $("#sp_comp_dtls_error").html("");
        }

        if ($('#Dynamic_banner_permission_id').prop('checked') == true) {
            if ($('.panel-body_remove').length == 0) {
                swal({
                    title: "Success",
                    text: "Dynamic banner is required",
                    timer: 2500
                });
                return false;
            }
        }
        if ($('#company_number_permission_id').is(':checked')) {
            if ($('#company_country_code').val() == 91 && $('#company_number').val().length < 10) {
                $('#company_numbererror').text("Number must be 10 digits.");
                $('#company_number').focus();
                return false;
            }
        }
        if (eventcheck && priocheck && dynbnrchk == 0 && cmpchkd > 0) {
            if ($('#social_link_permission_id').prop('checked') == true) {
                if ($('#social_link_header').val() == '') {
                    $('#social_link_header_error').text("Please enter social link header.");
                    return false;
                } else {
                    $('#social_link_header_id_error').text("");
                }

                if ($('#link_Facebook').val().trim() != "" || $('#link_Twitter').val().trim() != "" || $(
                        '#link_Youtube').val().trim() != "" || $('#link_Instagram').val().trim() != "" || $(
                        '#txtMobileNumber').val().trim() != "") {
                    if ($('#txtCountryCode').val() == 91) {
                        $('#txtMobileNumber').prop('maxlength', '10');
                        if ($('#txtMobileNumber').val() != "" && $('#txtMobileNumber').val().length != 10) {
                            $('#link_WhatsApp_error').text("Number must be 10 digit.");
                            $('#txtMobileNumber').val("");
                            //return false;
                        }
                        if ($('#customer_care_mobile').val() != "" && $('#customer_care_mobile').val().length !=
                            10) {
                            $('#customer_care_mobile_error').text("Number must be 10 digit.");
                            $('#customer_care_mobile').val("");
                            //return false;
                        } else {
                            $("#myModal_outlets").modal("show");
                        }
                    } else {
                        $("#myModal_outlets").modal("show");
                    }
                } else {
                    alert("Atleast One social link needed");
                    $('#link_Facebook').focus();
                }
            } else {
                $("#myModal_outlets").modal("show");
            }
        }
        return;

    });
    $(document).ready(function() {
        // $('.clstheme').show();
        //alert($('#outlet_id').val());
        //$('#banner_table_id').DataTable().ajax.reload();
        var outlet_id = $('#outlet_id').val();
        $('#banner_table_id').DataTable({
            destroy: true,
            processing: true,
            serverSide: true,
            responsive: true,
            "ordering": false,
            ajax: {
                url: "{{ url('datatable/banner_list') }}",
                data: {
                    'outletid': outlet_id
                }
            },
            "columnDefs": [{
                    "width": "20%",
                    "targets": 0
                },
                {
                    "width": "20%",
                    "targets": 1
                },
                {
                    "width": "30%",
                    "targets": 2
                },
                {
                    "width": "20%",
                    "targets": 3
                },
                {
                    "width": "10%",
                    "targets": 4
                }
            ],
            columns: [

                {
                    data: 'banner_image',
                    name: 'wl_outlet_banner.banner_image',
                    orderable: false,
                    searchable: false,
                    render: function(data, type, full, meta) {
                        // console.log(data.id)
                        if (data != '')
                            return '<img src="' + data +
                                '" style="width:70px !important; height:70px !important;margin: 0px auto;display: block;">';
                    }
                },
                {
                    data: 'banner_priority',
                    name: 'wl_outlet_banner.banner_priority'
                },
                {
                    data: 'banner_link',
                    name: 'wl_outlet_banner.banner_link'
                },
                {
                    data: {
                        id: 'id',
                        status: 'status'
                    },
                    orderable: false,
                    searchable: false,
                    render: function(data, type, full, meta) {
                        // console.log(data.status);
                        return '' + ((data.status == 2) ?
                            '<h6 style="color:green;">Saved & Applied</h6>' :
                            '<h6 style="color:red;">Saved & Not Applied</h6>') + '';
                    }
                },
                {
                    data: 'id',
                    name: 'wl_outlet_banner.id',
                    orderable: false,
                    searchable: false,
                    render: function(data, type, full, meta) {
                        return '<a href="javascript:void(0)" class="editbanner" data-id="' +
                            data +
                            '">Edit</a> | <a href="javascript:void(0)" style="color: red !important;" class="deletebanner" data-id="' +
                            data + '">Delete</a>';
                    }
                },


            ],
        });
        //===MP====
        $('input[type="text"]').keyup(function() {
            if ($(this).val() != "") {
                $(this).closest('div').find(".p-error1").text("");
            }
        });

        $('textarea').keyup(function() {
            if ($(this).val() != "") {
                $(this).closest('div').find(".p-error1").text("");
            }
        });

        $('select').change(function() {
            if ($(this).val() != "") {
                $(this).closest('div').find(".p-error1").text("");
            }
        });
        //===MP====

        if ($('#select_all').is(':checked')) {
            $('.checkbox').each(function() {
                this.checked = true;
            });
        }
        checking();

        function checking() {
            var check = 0;
            $('.checkbox').each(function() {
                if ($(this).is(":not(:checked)")) {
                    check++;
                }
            });
            if (check == 0) {
                $('#select_all').prop('checked', true);
            }
        }

        $('#select_all').on('click', function() {
            if (this.checked && (this.disabled == false)) {
                $('.checkbox').each(function() {
                    this.checked = true;
                });
            } else {
                $('.checkbox').each(function() {
                    this.checked = false;
                });
            }
        });

        $('.checkbox').on('click', function() {
            if ($('.checkbox:checked').length == $('.checkbox').length && (this.disabled == false)) {
                $('#select_all').prop('checked', true);
            } else {
                $('#select_all').prop('checked', false);
            }
        });
    });

    $('#all_output_submit_id').on('click', function(event) {
        $('#myModal_outlets').modal('hide');
        $('#confirmmultiple_outlets').modal('show');
    });
    $('.companydetails_yes').on('click', function(event) {
        event.preventDefault();
        $("#input_apply_multiple_company").val($(this).data('accept_type'));
        var form = $('#ebill_structure_id')[0];
        var data = new FormData(form);
        $(".loading-data").show();
        $.ajax({
            url: "{{ url('update/all/outlet') }}",
            type: 'POST',
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            success: function(data) {
                if (data.error == false) {
                    $(".loading-data").hide();
                    $('#myModal_outlets').modal('hide');
                    swal({
                        title: "Success",
                        text: data.success,
                        timer: 2500
                    });
                    setTimeout(function() {
                        window.location.replace("{{ url('list_outlet_ebill') }}");
                    }, 3000);
                } else {
                    var msg = data.success;
                    $('#ebill_output_id').html(msg);
                }
            }
        });
        console.log(data);
    });
    // $('#all_output_submit_id').on('click',function(event){
    // 		event.preventDefault();
    // 		var form = $('#ebill_structure_id')[0];
    // 		var data = new FormData(form);
    // 		$(".loading-data").show();
    //         $.ajax({
    //             url:'{{ url('update/all/outlet') }}',
    //             type: 'POST',
    //             data: data,      
    //             processData: false,
    //             contentType: false,
    //             cache: false,
    //             success:function(data)
    //             {
    //                 if(data.error==false)
    //                 {
    //                 	$(".loading-data").hide();   
    //                 	$('#myModal_outlets').modal('hide');
    //                       swal({
    //                            title: "Success",
    //                            text: data.success,
    //                            timer: 2500
    //                        }); 
    //                        setTimeout(function(){ 
    //                              window.location.replace("{{ url('list_outlet_ebill') }}");
    //                            }, 3000);
    //                 }else{
    //                    var msg = data.success;
    //                    $('#ebill_output_id').html(msg);
    //                 }
    //             }
    //         });
    //     console.log(data);
    // });

    function read_edit_banner_URLadd_set(input) {
        $('.clearimage_set_edit').show();
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                // $('#blah_edit_banneradd_set').attr('src', e.target.result);
                $('#addbannererror_modal_image').html('');
                var banner_image = $(input).val();
                if (banner_image) {
                    $('.dynamic_clearimage_set').show();
                    $('#adddynamicimage_set').html('Change Image');
                    if (!banner_image.match(/(?:jpg|png|jpeg|JPEG|PNG|JPG)$/)) {
                        $('#addbannererror_modal_image').html("This file format is not accepted");
                    } else {

                        var file, img;
                        if ((file = input.files[0])) {
                            img = new Image();
                            img.onload = function() {
                                var ratio = 0;
                                if ($('#tile_banner_layout').val() == 2) {
                                    ratio = 320 / 240;
                                } else {
                                    ratio = 500 / 200;
                                }
                                //alert(ratio);
                                // var ratio = 320/240;

                                //var ratio = 1.39;
                                var imageratio = (this.width) / (this.height);
                                if (ratio.toFixed(1) == imageratio.toFixed(1)) {
                                    //if(imageratio > 1){		
                                    var iSize = ($(input)[0].files[0].size / 1024);
                                    iSize = (Math.round(iSize * 100) / 100);
                                    if (iSize <= 50) {
                                        $('#edit_dynamic_banner_submit_id').attr('disabled', false);
                                    } else {
                                        $('#addbannererror_modal_image').html(
                                            'Maximum File size should be 50 KB. Your file size is ' +
                                            iSize + ' KB');
                                        $('#edit_dynamic_banner_submit_id').attr('disabled', 'disabled');
                                    }
                                } else {
                                    if ($('#tile_banner_layout').val() == 2) {
                                        $('#addbannererror_modal_image').html(
                                            'Image Ratio Should be Exact 4 : 3.');
                                    } else {
                                        $('#addbannererror_modal_image').html(
                                            'Image Ratio Should be Exact 5 : 2.');
                                    }
                                    $('#edit_dynamic_banner_submit_id').attr('disabled', 'disabled');
                                }
                            };
                            img.src = _URL_set.createObjectURL(file);
                            $('#dynamic_add_banneradd_set').attr('src', _URL_set.createObjectURL(file));
                        }
                    }
                } else {
                    $('.dynamic_clearimage_set').hide();
                    $('#adddynamicimage_set').html('Add Image');
                    $('#dynamic_add_banneradd_set').attr('src', "{{ asset('images/icon/Icons-01.png') }}");
                }

                $('#dynamic_edit_banneradd_set').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $('#add_banner_submit_id').on('click', function(e) {
        $('#banner_table_id').DataTable().ajax.reload();
    });
    //bb
    // $('#add_dynamic_banner_submit_id').on('click', function(e) {
    //     $('#dynamic_banner_table_id').DataTable().ajax.reload();
    // });

    function prioritynocheck2(i) {
        $('.chk_priority:checked').length;
        var x = 0;
        $('.chk_priority').each(function() {
            if ($(this).prop('checked') == true) {
                var j = $(this).closest('.panel-title').find('.cl_priority').val();
                if (i == j) {
                    x = x + 1;
                }
            }
        })
        return x;
    }

    function prioritynocheck() {
        $('.chk_priority:checked').length;
        var i = 1;
        //var msg="";
        $('.chk_priority').each(function() {
            if (prioritynocheck2(i) == 0) {
                return false;
            }
            i++;
        })
    }

    function validation(param) {
        $('.category-error').html('');
        $('#logo_type_error').html('');
        var company_details_permission = 0;
        if ($('input[name=company_details_permission]').is(":checked")) {
            company_details_permission = 1;
        }
        var bill_details_permission = 0;
        // var company_details_priority = $('input[name=company_details_priority]').val();
        // var bill_details_permission = 0;
        // if($('input[name=bill_details_permission]').is(":checked")){
        // 	bill_details_permission = 1;
        // }

        var item_details_permission = 0;
        if ($('input[name=item_details_permission]').is(":checked")) {
            item_details_permission = 1;
        }
        var item_details_priority = $('input[name=item_details_priority]').val();
        var footnote_permission = 0;
        if ($('input[name=footnote_permission]').is(":checked")) {
            footnote_permission = 1;
        }
        var footnote = $('textarea[name=footnote]').val();
        //var footnote_priority = $('input[name=footnote_priority]').val();
        //bb
        var dynamic_banner_tile1_permission = 0;
        if ($('input[name=dynamic_banner_tile1_permission]').is(":checked")) {
            dynamic_banner_tile1_permission = 1;
        }
        var dynamic_banner_tile2_permission = 0;
        if ($('input[name=dynamic_banner_tile2_permission]').is(":checked")) {
            dynamic_banner_tile2_permission = 1;
        }
        var dynamic_banner_tile3_permission = 0;
        if ($('input[name=dynamic_banner_tile3_permission]').is(":checked")) {
            dynamic_banner_tile3_permission = 1;
        }
        var dynamic_banner_tile1_priority = $('input[name=dynamic_banner_tile1_priority]').val();
        var dynamic_banner_tile2_priority = $('input[name=dynamic_banner_tile2_priority]').val();
        var dynamic_banner_tile3_priority = $('input[name=dynamic_banner_tile3_priority]').val();

        var banner_permission = 0;
        if ($('input[name=banner_permission]').is(":checked")) {
            banner_permission = 1;
        }

        var dynamic_banner_permission = 0;
        if ($('input[name=dynamic_banner_permission]').is(":checked")) {
            dynamic_banner_permission = 1;
        }
        var banner_priority = $('#bannerpriority_id').val();
        // alert(banner_priority);
        var company_name_permission = 0;
        if ($('input[name=company_name_permission]').is(":checked")) {
            company_name_permission = 1;
        }
        var company_name = $('input[name=company_name]').val();
        var company_name_heading = $('input[name=company_name_heading]').val();
        var company_address1_permission = 0;
        if ($('input[name=company_address1_permission]').is(":checked")) {
            company_address1_permission = 1;
        }
        var company_address1 = $('input[name=company_address1]').val();
        var address1_priority = $('input[name=address1_priority]').val();
        var company_address2_permission = 0;
        if ($('input[name=company_address2_permission]').is(":checked")) {
            company_address2_permission = 1;
        }
        var company_address2 = $('input[name=company_address2]').val();
        var address2_priority = $('input[name=address2_priority]').val();
        var company_address3_permission = 0;
        if ($('input[name=company_address3_permission]').is(":checked")) {
            company_address3_permission = 1;
        }
        var company_address3 = $('input[name=company_address3]').val();
        var address3_priority = $('input[name=address3_priority]').val();
        var gst_permission = 0;
        if ($('input[name=gst_permission]').is(":checked")) {
            gst_permission = 1;
        }
        var gst_no = $('input[name=gst_no]').val();
        var gst_priority = $('input[name=gst_priority]').val();
        //newdata
        var legal_name_permission = 0;
        if ($('input[name=legal_name_permission]').is(":checked")) {
            legal_name_permission = 1;
        }
        var legal_name = $('input[name=legal_name]').val();
        var legal_name_priority = $('input[name=legal_name_priority]').val();

        var outlet_location_permission = 0;
        if ($('input[name=outlet_location_permission]').is(":checked")) {
            outlet_location_permission = 1;
        }
        var outlet_location = $('input[name=outlet_location]').val();



        //newdata
        var company_number_permission = 0;
        if ($('input[name=company_number_permission]').is(":checked")) {
            company_number_permission = 1;
        }
        var company_number = $('input[name=company_number]').val();
        var company_number_priority = $('input[name=company_number_priority]').val();

        var payment_details_permission = 0;
        if ($('input[name=payment_details_permission]').is(":checked")) {
            payment_details_permission = 1;
        }
        var payment_details_priority = $('input[name=payment_details_priority]').val();

        var other_details_permission = 0;
        if ($('input[name=other_details_permission]').is(":checked")) {
            other_details_permission = 1;
        }
        var totalbill_tax_permission = 0;
        if ($('input[name=tax_checkbox]').is(":checked")) {
            totalbill_tax_permission = 1;
        }

        var other_details_priority = $('input[name=other_details_priority]').val();
        var ebill_updates_priority = $('input[name=ebill_updates_priority]').val();

        var transactionid_permission = 0;
        if ($('input[name=transactionid_permission]').is(":checked")) {
            transactionid_permission = 1;
        }
        var transactionid_name = $('input[name=transactionid_name]').val();
        var transactionid_priority = $('input[name=transactionid_priority]').val();

        var bill_number_permission = 0;
        if ($('input[name=bill_number_permission]').is(":checked")) {
            bill_number_permission = 1;
        }

        var bill_number_name = $('input[name= bill_number_name]').val();
        var bill_number_priority = $('input[name=bill_number_priority]').val();

        var bill_date_permission = 0;
        if ($('input[name=bill_date_permission]').is(":checked")) {
            bill_date_permission = 1;
        }
        var bill_date_name = $('input[name=bill_date_name]').val();
        var bill_date_priority = $('input[name=bill_date_priority]').val();

        var bill_time_permission = 0;
        if ($('input[name=bill_time_permission]').is(":checked")) {
            bill_time_permission = 1;
        }
        var bill_time_name = $('input[name=bill_time_name]').val();
        var bill_time_priority = $('input[name=bill_time_priority]').val();

        var table_permission = 0;
        if ($('input[name=table_permission]').is(":checked")) {
            table_permission = 1;
        }
        var table_name = $('input[name=table_name]').val()
        var table_priority = $('input[name=table_priority]').val();

        var section_permission = 0;
        if ($('input[name=section_permission]').is(":checked")) {
            section_permission = 1;
        }
        var section_name = $('input[name=section_name]').val();

        var section_priority = $('input[name=section_priority]').val();

        var server_permission = 0;
        if ($('input[name=server_permission]').is(":checked")) {
            server_permission = 1;
        }
        var server_name = $('input[name=server_name]').val();
        var server_priority = $('input[name=server_priority]').val();

        var service_permission = 0;
        if ($('input[name=service_permission]').is(":checked")) {
            service_permission = 1;
        }
        var service_name = $('input[name=service_name]').val();
        var service_priority = $('input[name=service_priority]').val();

        var channel_permission = 0;
        if ($('input[name=channel_permission]').is(":checked")) {
            channel_permission = 1;
        }
        var channel_name = $('input[name=channel_name]').val();
        var channel_priority = $('input[name=channel_priority]').val();

        var customer_name_permission = 0;
        if ($('input[name=customer_name_permission]').is(":checked")) {
            customer_name_permission = 1;
        }
        var customer_name_name = $('input[name=customer_name_name]').val();
        var customer_name_priority = $('input[name=customer_name_priority]').val();

        var customer_number_permission = 0;
        if ($('input[name=customer_number_permission]').is(":checked")) {
            customer_number_permission = 1;
        }
        var customer_number_name = $('input[name=customer_number_name]').val();
        var customer_number_priority = $('input[name=customer_number_priority]').val();

        var customer_gstin_permission = 0;
        if ($('input[name=customer_gstin_permission]').is(":checked")) {
            customer_gstin_permission = 1;
        }
        var customer_gstin_name = $('input[name=customer_gstin_name]').val();
        var customer_gstin_priority = $('input[name=customer_gstin_priority]').val();

        var customer_pan_permission = 0;
        if ($('input[name=customer_pan_permission]').is(":checked")) {
            customer_pan_permission = 1;
        }
        var customer_pan = $('input[name=customer_pan]').val();
        var customer_pan_priority = $('input[name=customer_pan_priority]').val();

        var customer_storename_permission = 0;
        if ($('input[name=customer_storename_permission]').is(":checked")) {
            customer_storename_permission = 1;
        }
        var customer_store_name = $('input[name=customer_store_name]').val();
        var customer_storename_priority = $('input[name=customer_storename_priority]').val();

        // var slno_permission = 0;
        // if($('input[name=slno_permission]').is(":checked")){
        // 	slno_permission = 1;
        // }
        // var slno_priority= $('input[name=slno_priority]').val();

        var items_permission = 0;
        if ($('input[name=items_permission]').is(":checked") && $("#item_details_permission_id").is(":checked")) {
            items_permission = 1;
        }
        var items_priority = $('input[name=items_priority]').val();
        var items_name = $('input[name=items_name]').val();


        var item_quantity_permission = 0;
        if ($('input[name=item_quantity_permission]').is(":checked")) {
            item_quantity_permission = 1;
        }

        var item_quantity_priority = $('input[name=item_quantity_priority]').val();
        var item_quantity_name = $('input[name=item_quantity_name]').val();


        var item_rate_permission = 0;
        if ($('input[name=item_rate_permission]').is(":checked")) {
            item_rate_permission = 1;
        }

        var item_rate_priority = $('input[name=item_rate_priority]').val();
        var item_rate_name = $('input[name=item_rate_name]').val();

        var item_price_permission = 0;
        if ($('input[name=item_price_permission]').is(":checked")) {
            item_price_permission = 1;
        }
        var item_price_priority = $('input[name=item_price_priority]').val();
        var item_price_name = $('input[name=item_price_name]').val();


        var sub_total_permission = 0;
        if ($('input[name=sub_total_permission]').is(":checked")) {
            sub_total_permission = 1;
        }

        var sub_total_name = $('input[name=sub_total_name]').val();
        var sub_total_priority = $('input[name=sub_total_priority]').val();

        var billtax_name = $('input[name=billtax_name]').val();

        var tax_permission = 0;
        if ($('input[name=tax_permission]').is(":checked")) {
            tax_permission = 1;
        }

        var tax_name = $('input[name=tax_name]').val();
        var tax_priority = $('input[name=tax_priority]').val();

        var charges_permission = 0;
        if ($('input[name=charges_permission]').is(":checked")) {
            charges_permission = 1;
        }
        var charges_name = $('input[name=charges_name]').val();
        var charges_priority = $('input[name=charges_priority]').val();

        var discount_permission = 0;
        if ($('input[name=discount_permission]').is(":checked")) {
            discount_permission = 1;
        }
        var discount_name = $('input[name=discount_name]').val();
        var discount_priority = $('input[name=discount_priority]').val();

        var points_redeemed_permission = 0;
        if ($('input[name=points_redeemed_permission]').is(":checked")) {
            points_redeemed_permission = 1;
        }

        var points_redeemed_name = $('input[name=points_redeemed_name]').val();
        var points_redeemed_priority = $('input[name=points_redeemed_priority]').val();

        var gross_amount_permission = 0;
        if ($('input[name=gross_amount_permission]').is(":checked")) {
            gross_amount_permission = 1;
        }

        var gross_amount_name = $('input[name=gross_amount_name]').val();
        var gross_amount_priority = $('input[name=gross_amount_priority]').val();

        var netbill_paid_permission = 0;
        if ($('input[name=netbill_paid_permission]').is(":checked")) {
            netbill_paid_permission = 1;
        }
        var netbill_paid_name = $('input[name=netbill_paid_name]').val();
        var netbill_paid_priority = $('input[name=netbill_paid_priority]').val();

        var payment_mode_permission = 0;
        if ($('input[name=payment_mode_permission]').is(":checked")) {
            payment_mode_permission = 1;
        }
        var payment_mode_priority = $('input[name=payment_mode_priority]').val();
        var payment_mode_name = $('input[name=payment_mode_name]').val();


        var amount_in_words_permission = 0;
        if ($('input[name=amount_in_words_permission]').is(":checked")) {
            amount_in_words_permission = 1;
        }
        var amount_in_words_name = $('input[name=amount_in_words_name]').val();

        var amount_in_words_priority = $('input[name=amount_in_words_priority]').val();

        var logo_permission = 0;
        if ($('input[name=logo_permission]').is(':checked')) {
            logo_permission = 1;
        }
        var logo_priority = $('#logo_priority_id').val();


        var amount_due_permission = 0;
        if ($('input[name=amount_due_permission]').is(':checked')) {
            amount_due_permission = 1;
        }
        var amount_due_name = $('input[name=amount_due_name]').val();
        var amount_due_priority = $('input[name=amount_due_priority]').val();

        var home_permission = 0;
        if ($('input[name=home_permission]').is(':checked')) {
            home_permission = 1;
        }
        var home_link = $('input[name=home_link]').val();
        var home_priority = $('input[name=home_priority]').val();

        var login_permission = 0;
        if ($('input[name=login_permission]').is(':checked')) {
            login_permission = 1;
        }
        var login_link = $('input[name=login_link]').val();
        var login_priority = $('input[name=login_priority]').val();

        var menu_permission = 0;
        if ($('input[name=menu_permission]').is(':checked')) {
            menu_permission = 1;
        }
        var menu_link = $('input[name=menu_link]').val();
        var menu_priority = $('input[name=menu_priority]').val();


        var website_permission = 0;
        if ($('input[name=website_permission]').is(':checked')) {
            website_permission = 1;
        }
        var website_link = $('input[name=website_link]').val();
        var website_priority = $('input[name=website_priority]').val();

        var share_permission = 0;
        if ($('input[name=share_permission]').is(':checked')) {
            share_permission = 1;
        }
        var share_priority = $('input[name=share_priority]').val();

        var save_permission = 0;
        if ($('input[name=save_permission]').is(':checked')) {
            save_permission = 1;
        }
        var save_priority = $('input[name=save_priority]').val();

        var toolbar_permission = 0;
        if ($('input[name=toolbar_permission]').is(':checked')) {
            toolbar_permission = 1;
        }

        var hsn_code_permission = 0;
        if ($('input[name=hsn_code_permission]').is(":checked")) {
            hsn_code_permission = 1;
        }
        var hsn_code_name = $('input[name=hsn_code_name]').val();
        var hsn_code_priority = $('input[name=hsn_code_priority]').val();

        var bar_code_permission = 0;
        if ($('input[name=bar_code_permission]').is(":checked")) {
            bar_code_permission = 1;
        }

        var bar_code_name = $('input[name=bar_code_name]').val();
        var bar_code_priority = $('input[name=bar_code_priority]').val();

        var item_discount_permission = 0;
        if ($('input[name=item_discount_permission]').is(":checked")) {
            item_discount_permission = 1;
        }
        var rsp_permission = 0;
        if ($('input[name=item_rsv_permission]').is(":checked")) {
            rsp_permission = 1;
        }
        // var lpd_permission = 0;
        // if($('input[name=item_lpd_permission]').is(":checked")){
        // 	lpd_permission = 1;
        // }
        var item_discount_name = $('input[name=item_discount_name]').val();
        var item_rsv_name = $('input[name=item_rsv_name]').val();
        var item_discount_priority = $('input[name=item_discount_priority]').val();
        var rsp_priority = $('input[name=item_rsv_priority]').val();

        var item_lpd_name = $('input[name=item_lpd_name]').val();
        var lpd_priority = $('input[name=item_lpd_priority]').val();

        var item_tax_permission = 0;
        if ($('input[name=item_tax_permission]').is(":checked")) {
            item_tax_permission = 1;
        }
        var item_tax_name = $('input[name=item_tax_name]').val();
        var item_tax_priority = $('input[name=item_tax_priority]').val();

        var marked_price_permission = 0;
        if ($('input[name=marked_price_permission]').is(":checked")) {
            marked_price_permission = 1;
        }
        var marked_price_priority = $('input[name=marked_price_priority]').val();
        var marked_price_name = $('input[name=marked_price_name]').val();


        var template_name = $('input[name=template_name]').val();

        var roundoff_permission = 0;
        if ($('input[name=roundoff_permission]').is(':checked')) {
            roundoff_permission = 1;
        }
        var roundoff_name = $('input[name=roundoff_name]').val();
        var roundoff_priority = $('input[name=roundoff_priority]').val();


        var mode_of_payment_permission = 0;
        if ($('input[name=mode_of_payment_permission]').is(':checked')) {
            mode_of_payment_permission = 1;
        }
        var mode_of_payment_name = $('input[name=mode_of_payment_name]').val();
        var mode_of_payment_priority = $('input[name=mode_of_payment_priority]').val();

        var delivery_address_details_permission = 0;
        if ($('input[name=delivery_address_details_permission]').is(":checked")) {
            delivery_address_details_permission = 1;
        }
        var delivery_address_details_priority = $('input[name=delivery_address_details_priority]').val();

        var delivery_address_permission = 0;
        if ($('input[name=delivery_address_permission]').is(':checked')) {
            delivery_address_permission = 1;
        }
        var delivery_address = $('input[name=delivery_address]').val();
        var delivery_address_priority = $('input[name=delivery_address_priority]').val();

        var pincode_permission = 0;
        if ($('input[name=pincode_permission]').is(':checked')) {
            pincode_permission = 1;
        }
        var pincode = $('input[name=pincode]').val();
        var pincode_priority = $('input[name=pincode_priority]').val();

        var city_permission = 0;
        if ($('input[name=city_permission]').is(':checked')) {
            city_permission = 1;
        }
        var city = $('input[name=city]').val();
        var city_priority = $('input[name=city_priority]').val();

        var landmark_permission = 0;
        if ($('input[name=landmark_permission]').is(':checked')) {
            landmark_permission = 1;
        }
        var landmark = $('input[name=landmark]').val();
        var landmark_priority = $('input[name=landmark_priority]').val();

        var terms_and_condition_permission = 0;
        if ($('input[name=terms_and_conditions_permission]').is(':checked')) {
            terms_and_condition_permission = 1;
        }
        var terms_and_conditions_priority = $('input[name=terms_and_conditions_priority]').val();


        var t_and_c1_permission = 0;
        if ($('input[name=t_and_c1_permission]').is(':checked')) {
            t_and_c1_permission = 1;
        }

        var t_and_c1 = $('textarea[name=t_and_c1]').val();
        var t_and_c1_priority = $('input[name=t_and_c1_priority]').val();



        var t_and_c2_permission = 0;
        if ($('input[name=t_and_c2_permission]').is(':checked')) {
            t_and_c2_permission = 1;
        }
        var t_and_c2 = $('textarea[name=t_and_c2]').val();
        var t_and_c2_priority = $('input[name=t_and_c2_priority]').val();


        var t_and_c3_permission = 0;
        if ($('input[name=t_and_c3_permission]').is(':checked')) {
            t_and_c3_permission = 1;
        }
        var t_and_c3 = $('textarea[name=t_and_c3]').val();
        var t_and_c3_priority = $('input[name=t_and_c3_priority]').val();


        var t_and_c4_permission = 0;
        if ($('input[name=t_and_c4_permission]').is(':checked')) {
            t_and_c4_permission = 1;
        }
        var t_and_c4 = $('textarea[name=t_and_c4]').val();
        var t_and_c4_priority = $('input[name=t_and_c4_priority]').val();


        var t_and_c5_permission = 0;
        if ($('input[name=t_and_c5_permission]').is(':checked')) {
            t_and_c5_permission = 1;
        }
        var t_and_c5 = $('textarea[name=t_and_c5]').val();
        var t_and_c5_priority = $('input[name=t_and_c5_priority]').val();

        var link_feedback_permission = 0;
        if ($('input[name=link_feedback_permission]').is(':checked')) {
            link_feedback_permission = 1;
        }

        //alert($('#link_feedback_posisson_id').val());
        //var link_feedback_posisson_id= $('#link_feedback_posisson_id').val();
        var link_feedback = $('input[name=link_feedback]').val();
        var link_feedback_form = $('select[name=link_feedback_form]').val();
        var Dynamic_feedback_permission = 0;
        if ($('input[name=feedback_dynamic_text_permission]').is(':checked')) {
            Dynamic_feedback_permission = 1;
        }

        var feedback_heading_text_permission = 0;
        var feedback_heading_text = $('input[name=feedback_heading_text]').val();
        if ($('input[name=feedback_heading_text_permission]').is(':checked')) {
            feedback_heading_text_permission = 1;
        }

        var feedback_subheading_text_permission = 0;
        var feedback_subheading_text = $('input[name=feedback_subheading_text]').val();
        if ($('input[name=feedback_subheading_text_permission]').is(':checked')) {
            feedback_subheading_text_permission = 1;
        }

        //alert(link_feedback_form);
        var bill_details_pevalidationrmission = 0;
        if ($('input[name=bill_details_permission]').is(":checked")) {
            bill_details_permission = 1;
        }
        var bill_details_priority = $('input[name=bill_details_priority]').val();
        //alert(bill_details_priority);

        var social_link_permission = 0;
        if ($('input[name=social_link_permission]').is(":checked")) {
            social_link_permission = 1;
        }
        //alert(social_link_permission);
        var elem = "";
        if ($('#logo_image_size').val() == 1) {
            elem = document.getElementById('blah_add_banneradd_43');
        } else {
            elem = document.getElementById('blah_add_banneradd_51');
        }
        if (vrsn == 1) {
            elem = document.getElementById('blah_add_banneradd_43');
        }
        //if(vrsn==2){
        if (logo_permission == 1 && elem.getAttribute('src') == "{{ asset('images/icon/Icons-01.png') }}" && $(
                '#logoimage_collapse_id').prop('checked') == true) {
            $('input[id=logo_image]').focus();
            $('#addbannererror').html('Please add an Image');
            $('#ebill_structure_submit_id').attr('disabled', 'disabled');
            $('#save_apply').attr('disabled', 'disabled');
            console.log('error- 1');
            return false;
        }
        //}
        if ($('#logo_image_size').val() == 2) {
            if ($('#logo_image_type').val() == '') {
                $('#logo_type_error').html('Select Logo Type');
                return false;
            }
        }
        if (toolbar_permission == 1 && save_permission == 0 && share_permission == 0 && menu_permission == 0 &&
            login_permission == 0 && home_permission == 0) {
            $('input[name=toolbar_permission]').focus();
            $('#toolbar_permissionerror').html('Please Select Atleast One option inside Toolbar');
            console.log('error- 2');
            return false;
        }

        // if(logo_permission == 1 && (logo_priority == "" || parseInt(logo_priority) == 0)){
        // 	$('#logo_priority_id').focus();
        // 	$('#logo_priorityerror').html('This field cannot be blank');
        // 	$('#logo_priorityerror').addClass('set-erroe-custom');
        // 	console.log('error- 3');
        // 	return false;
        // }

        // if(roundoff_permission == 1 && roundoff_name == ""){
        // 	$('input[name=roundoff_name]').focus();
        // 	$('#roundoff_nameerror').html('This field is required');
        // 	return false;
        // }

        if (template_name == "") {
            $('input[name=template_name]').focus();
            $('#template_nameerror').html('This field is required');
            console.log('error- 4');
            return false;
        }


        if (save_permission == 1 && (save_priority == "" || save_priority == 0)) {
            $('input[name=save_priority]').focus();
            var i = 1;
            //var msg="";
            $('.chk_priority').each(function() {
                if (prioritynocheck2(i) == 0) {
                    $('#save_priorityerror').html('This field need priority value :' + i);
                    $('#save_priorityerror').addClass('set-erroe-custom');
                    console.log('error- 5');
                    return false;
                }
                i++;
            });
            $('#save_priorityerror').html('Priority cannot be 0 or blank');
            $("#save_priorityerror").addClass('set-erroe-custom');
            console.log('error- ' + (value != save_priority));
            return value != save_priority;
        }

        if (share_permission == 1 && (share_priority == "" || share_priority == 0)) {
            $('input[name=share_priority]').focus();
            var i = 1;
            $('.chk_priority').each(function() {
                if (prioritynocheck2(i) == 0) {
                    $('#share_priorityerror').html('This field need priority value :' + i);
                    $('#share_priorityerror').addClass('set-erroe-custom');
                    console.log('error- 6');
                    return false;
                }
                i++;
            });
            $('#share_priorityerror').html('Priority cannot be 0 or blank');
            $("#share_priorityerror").addClass('set-erroe-custom');
            console.log('error- 7');
            return false;
        }

        if (menu_permission == 1 && (menu_priority == "" || menu_priority == 0)) {
            $('input[name=menu_priority]').focus();
            var i = 1;
            $('.chk_priority').each(function() {
                if (prioritynocheck2(i) == 0) {
                    $('#menu_priorityerror').html('This field need priority value :' + i);
                    $('#menu_priorityerror').addClass('set-erroe-custom');
                    console.log('error- 8');
                    return false;
                }
                i++;
            });
            $('#menu_priorityerror').html('Priority cannot be 0 or blank');
            $("#menu_priorityerror").addClass('set-erroe-custom');
            console.log('error- 9');
            return false;
        }

        if (menu_permission == 1 && menu_link == "") {
            $('input[name=menu_link]').focus();
            $('#menu_linkerror').html('This field is required');
            console.log('error- 10');
            return false;
        }
        if (website_permission == 1 && (website_priority == "" || website_priority == 0)) {
            $('input[name=website_priority]').focus();
            var i = 1;
            $('.chk_priority').each(function() {
                if (prioritynocheck2(i) == 0) {
                    $('#website_priorityerror').html('This field need priority value :' + i);
                    $('#website_priorityerror').addClass('set-erroe-custom');
                    console.log('error- 8');
                    return false;
                }
                i++;
            });
            $('#website_priorityerror').html('Priority cannot be 0 or blank');
            $("#website_priorityerror").addClass('set-erroe-custom');
            console.log('error- 9');
            return false;
        }

        if (website_permission == 1 && website_link == "") {
            $('input[name=website_link]').focus();
            $('#website_linkerror').html('This field is required');
            console.log('error- 10');
            return false;
        }

        if (home_permission == 1 && (home_priority == "" || home_priority == 0)) {
            $('input[name=home_priority]').focus();
            var i = 1;
            $('.chk_priority').each(function() {
                if (prioritynocheck2(i) == 0) {
                    $('#home_priorityerror').html('This field need priority value :' + i);
                    $('#home_priorityerror').addClass('set-erroe-custom');
                    console.log('error- 11');
                    return false;
                }
                i++;
            });
            $('#home_priorityerror').html('Priority cannot be 0 or blank');
            $("#home_priorityerror").addClass('set-erroe-custom');
            console.log('error- 12');
            return false;
        }

        if (home_permission == 1 && home_link == "") {
            $('input[name=home_link]').focus();
            $('#home_linkerror').html('This field is required');
            console.log('error- 13');
            return false;
        }


        if (login_permission == 1 && (login_priority == "" || login_priority == 0)) {
            $('input[name=login_priority]').focus();
            var i = 1;
            $('.chk_priority').each(function() {
                if (prioritynocheck2(i) == 0) {
                    $('#login_priorityerror').html('This field need priority value :' + i);
                    $('#login_priorityerror').addClass('set-erroe-custom');
                    console.log('error- 14');
                    return false;
                }
                i++;
            });
            $('#login_priorityerror').html('Priority cannot be 0 or blank');
            $("#login_priorityerror").addClass('set-erroe-custom');
            console.log('error- 15');
            return false;
        }

        if (login_permission == 1 && login_link == "") {
            $('input[name=login_link]').focus();
            $('#login_linkerror').html('This field is required');
            console.log('error- 16');
            return false;
        }






        if (payment_details_permission == 1 && (payment_details_priority == "" || payment_details_priority == 0)) {

            $('input[name=payment_details_priority]').focus();
            var i = 1;
            $('.chk_priority').each(function() {
                if (prioritynocheck2(i) == 0) {
                    $('#payment_details_priorityerror').html('This field need priority value :' + i);
                    $('#payment_details_priorityerror').addClass('set-erroe-custom');
                    console.log('error- 17');
                    return false;
                }
                i++;
            });
            $('#payment_details_priorityerror').html('Priority cannot be 0 or blank');
            $('#payment_details_priorityerror').addClass('set-erroe-custom');
            console.log('error- 18');
            return false;
        }


        if (payment_details_permission == 1) {
            if (netbill_paid_permission == 1 && (netbill_paid_name == "" || netbill_paid_name == 0)) {
                $('input[name=netbill_paid_name]').focus();
                $('#netbill_paid_name_error').html('This field is required');
                console.log('error- 19');
                return false;
            }

            // console.log(netbill_paid_permission,netbill_paid_priority,netbill_paid_name);
            if (netbill_paid_permission == 1 && (netbill_paid_priority == "" || netbill_paid_priority == 0)) {
                $('input[name=netbill_paid_priority]').focus();
                var i = 1;
                $('.chk_priority').each(function() {
                    if (prioritynocheck2(i) == 0) {
                        $('#netbill_paid_priorityerror').html('This field need priority value :' + i);
                        $('#netbill_paid_priorityerror').addClass('set-erroe-custom');
                        console.log('error- 20');
                        return false;
                    }
                    i++;
                });
                $('#netbill_paid_priorityerror').html('Priority cannot be 0 or blank');
                $("#netbill_paid_priorityerror").addClass('set-erroe-custom');
                console.log('error- 21');
                return false;
            }

            if (amount_due_permission == 1 && (amount_due_name == "" || amount_due_name == 0)) {
                $('input[name=amount_due_name]').focus();
                $('#amount_due_name_error').html('This field is required');
                console.log('error- 22');
                return false;
            }

            if (amount_due_permission == 1 && (amount_due_priority == "" || amount_due_priority == 0)) {
                $('input[name=amount_due_priority]').focus();
                var i = 1;
                $('.chk_priority').each(function() {
                    if (prioritynocheck2(i) == 0) {
                        $('#amount_due_priorityerror').html('This field need priority value :' + i);
                        $('#amount_due_priorityerror').addClass('set-erroe-custom');
                        console.log('error- 23');
                        return false;
                    }
                    i++;
                });
                $('#amount_due_priorityerror').html('Priority cannot be 0 or blank');
                $("#amount_due_priorityerror").addClass('set-erroe-custom');
                console.log('error- 24');
                return false;
            }
            if (amount_in_words_permission == 1 && (amount_in_words_name == "" || amount_in_words_name == 0)) {
                $('input[name=amount_in_words_name]').focus();
                $('#amount_in_words_name_error').html('This field is required');
                console.log('error- 31');
                return false;
            }

            if (amount_in_words_permission == 1 && (amount_in_words_priority == "" || amount_in_words_priority == 0)) {
                $('input[name=amount_in_words_priority]').focus();
                var i = 1;
                $('.chk_priority').each(function() {
                    if (prioritynocheck2(i) == 0) {
                        $('#amount_in_words_priorityerror').html('This field need priority value :' + i);
                        $('#amount_in_words_priorityerror').addClass('set-erroe-custom');
                        console.log('error- 32');
                        return false;
                    }
                    i++;
                });
                $('#amount_in_words_priorityerror').html('Priority cannot be 0 or blank');
                $("#amount_in_words_priorityerror").addClass('set-erroe-custom');
                console.log('error- 30' + (value != amount_in_words_priority));
                return value != amount_in_words_priority;
            }

            if (roundoff_permission == 1 && (roundoff_name == "" || roundoff_name == 0)) {
                $('input[name=roundoff_name]').focus();
                $('#roundoff_name_error').html('This field is required');
                console.log('error- 33');
                return false;
            }


            if (roundoff_permission == 1 && (roundoff_priority == "" || roundoff_priority == 0)) {
                $('input[name=roundoff_priority]').focus();
                $('#roundoff_priorityerror').html('Priority cannot be 0 or blank');
                $("#roundoff_priorityerror").addClass('set-erroe-custom');
                console.log('error- 34');
                return false;
            }
        }

        if (payment_mode_permission == 1 && (payment_mode_priority == "" || payment_mode_priority == 0)) {
            $('input[name=payment_mode_priority]').focus();
            var i = 1;
            $('.chk_priority').each(function() {
                if (prioritynocheck2(i) == 0) {
                    $('#payment_mode_priorityerror').html('This field need priority value :' + i);
                    $('#payment_mode_priorityerror').addClass('set-erroe-custom');
                    console.log('error- 25');
                    return false;
                }
                i++;
            });
            $('#payment_mode_priorityerror').html('Priority cannot be 0 or blank');
            $("#payment_mode_priorityerror").addClass('set-erroe-custom');
            console.log('error- 26');
            return false;
        }
        if (payment_mode_permission == 1 && (payment_mode_name == "" || payment_mode_name == 0)) {
            $('input[name=payment_mode_name]').focus();
            $('#payment_mode_name_error').html('This field is required');
            console.log('error- 27');
            return false;
        }


        if (mode_of_payment_permission == 1 && mode_of_payment_name == "") {
            $('input[name=mode_of_payment_name]').focus();
            $('#mode_of_payment_name_error').html('This field is required');
            console.log('error- 28');
            return false;
        }


        if (mode_of_payment_permission == 1 && (mode_of_payment_priority == "" || mode_of_payment_priority == 0)) {
            $('input[name=mode_of_payment_priority]').focus();
            var i = 1;
            $('.chk_priority').each(function() {
                if (prioritynocheck2(i) == 0) {
                    $('#mode_of_payment_priorityerror').html('This field need priority value :' + i);
                    $('#mode_of_payment_priorityerror').addClass('set-erroe-custom');
                    console.log('error- 29');
                    return false;
                }
                i++;
            });
            $('#mode_of_payment_priorityerror').html('Priority cannot be 0 or blank');
            $('#mode_of_payment_priorityerror').addClass('set-erroe-custom');
            console.log('error- 30');
            return false;
        }

        if (other_details_permission == 1 && (other_details_priority == "" || other_details_priority == 0)) {
            $('input[name=other_details_priority]').focus();
            $('#other_details_priorityerror').html('Priority cannot be 0 or blank');
            $('#other_details_priorityerror').addClass('set-erroe-custom');
            console.log('error- 35');
            return false;
        }


        if (sub_total_permission == 1 && (sub_total_name == "" || sub_total_name == 0)) {
            $('input[name=sub_total_name]').focus();
            $('#sub_total_error').html('This field is required');
            console.log('error- 36');
            return false;
        }

        if (sub_total_permission == 1 && (sub_total_priority == "" || sub_total_priority == 0)) {
            $('input[name=sub_total_priority]').focus();
            var i = 1;
            $('.chk_priority').each(function() {
                if (prioritynocheck2(i) == 0) {
                    $('#sub_total_priorityerror').html('This field need priority value :' + i);
                    $('#sub_total_priorityerror').addClass('set-erroe-custom');
                    console.log('error- 37');
                    return false;
                }
                i++;
            });
            $('#sub_total_priorityerror').html('Priority cannot be 0 or blank');
            $("#sub_total_priorityerror").addClass('set-erroe-custom');
            console.log('error- 38');
            return false;
        }

        if (totalbill_tax_permission == 1 && (ebill_updates_priority == "" || ebill_updates_priority == 0)) {
            $('input[name=ebill_updates_priority]').focus();
            var i = 1;
            $('.chk_priority').each(function() {
                if (prioritynocheck2(i) == 0) {
                    $('#ebill_updates_priority_priorityerror').html('This field need priority value :' + i);
                    $('#ebill_updates_priority_priorityerror').addClass('set-erroe-custom');
                    console.log('error- 39');
                    return false;
                }
                i++;
            });
            $('#ebill_updates_priority_priorityerror').html('Priority cannot be 0 or blank');
            $('#ebill_updates_priority_priorityerror').addClass('set-erroe-custom');
            console.log('error- 40');
            return false;
        } else {
            $("#ebill_updates_priority_priorityerror").html('');
            $("#ebill_updates_priority_priorityerror").removeClass('set-erroe-custom');
        }
        if (totalbill_tax_permission == 1 && (billtax_name == "" || billtax_name == 0)) {
            $('input[name=billtax_name]').focus();
            $('#ebillup_name_error').html('This field is required');
            console.log('error- 41');
            return false;
        }



        if (tax_permission == 1 && (tax_name == "" || tax_name == 0)) {
            $('input[name=tax_name]').focus();
            $('#tax_name_error').html('This field is required');
            console.log('error- 42');
            return false;
        }

        if (tax_permission == 1 && (tax_priority == "" || tax_priority == 0)) {
            $('input[name=tax_priority]').focus();
            var i = 1;
            $('.chk_priority').each(function() {
                if (prioritynocheck2(i) == 0) {
                    $('#tax_priorityerror').html('This field need priority value :' + i);
                    $('#tax_priorityerror').addClass('set-erroe-custom');
                    console.log('error- 43');
                    return false;
                }
                i++;
            });
            $('#tax_priorityerror').html('Priority cannot be 0 or blank');
            $("#tax_priorityerror").addClass('set-erroe-custom');
            console.log('error- 44');
            return false;
        }

        if (charges_permission == 1 && (charges_name == "" || charges_name == 0)) {
            // alert(charges_name);
            $('input[name=charges_name]').focus();
            $('#charges_name_error').html('This field is required');
            console.log('error- 45');
            return false;
        }

        if (charges_permission == 1 && (charges_priority == "" || charges_priority == 0)) {
            // alert(charges_priority);
            $('input[name=charges_priority]').focus();
            $('#charges_priorityerror').html('Priority cannot be 0 or blank');
            $("#charges_priorityerror").addClass('set-erroe-custom');
            console.log('error- 46');
            return false;
        }

        if (discount_permission == 1 && (discount_name == "" || discount_name == 0)) {
            $('input[name=discount_name]').focus();
            $('#discount_name_error').html('This field is required');
            console.log('error- 47');
            return false;
        }

        if (discount_permission == 1 && (discount_priority == "" || discount_priority == 0)) {
            $('input[name=discount_priority]').focus();
            $('#discount_priorityerror').html('Priority cannot be 0 or blank');
            $("#discount_priorityerror").addClass('set-erroe-custom');
            console.log('error- 40' + (value != discount_priority));
            return value != discount_priority;
        }

        if (points_redeemed_permission == 1 && (points_redeemed_name == "" || points_redeemed_name == 0)) {
            $('input[name=	points_redeemed_name]').focus();
            $('#points_redeemed_name_error').html('This field is required');
            console.log('error- 48');
            return false;
        }


        if (points_redeemed_permission == 1 && (points_redeemed_priority == "" || points_redeemed_priority == 0)) {
            $('input[name=points_redeemed_priority]').focus();
            $('#points_redeemed_priorityerror').html('Priority cannot be 0 or blank');
            $("#points_redeemed_priorityerror").addClass('set-erroe-custom');
            console.log('error- 49');
            return false;
        }

        if (gross_amount_permission == 1 && (gross_amount_name == "" || gross_amount_name == 0)) {
            $('input[name=	gross_amount_name]').focus();
            $('#gross_amount_name_error').html('This field is required');
            console.log('error- 50');
            return false;
        }

        if (gross_amount_permission == 1 && (gross_amount_priority == "" || gross_amount_priority == 0)) {
            $('input[name=gross_amount_priority]').focus();
            $('#gross_amount_priorityerror').html('Priority cannot be 0 or blank');
            $("#gross_amount_priorityerror").addClass('set-erroe-custom');
            console.log('error- 51');
            return false;
        }

        if (item_price_permission == 1 && (item_price_priority == "" || item_price_priority == 0)) {
            $('input[name=item_price_priority]').focus();
            $('#item_price_priorityerror').html('Priority cannot be 0 or blank');
            $("#item_price_priorityerror").addClass('set-erroe-custom');
            console.log('error- 50' + (value != item_price_priority));
            return value != item_price_priority;
        }
        if (item_price_permission == 1 && (item_price_name == "" || item_price_name == 0)) {
            $('input[name=item_price_name]').focus();
            $('#item_price_name_error').html('This field is required');
            console.log('error- 52');
            return false;
        }


        if (item_rate_permission == 1 && (item_rate_priority == "" || item_rate_priority == 0)) {
            $('input[name=item_rate_priority]').focus();
            $('#item_rate_priorityerror').html('Priority cannot be 0 or blank');
            $("#item_rate_priorityerror").addClass('set-erroe-custom');
            console.log('error- 53');
            return false;
        }
        if (item_rate_permission == 1 && (item_rate_name == "" || item_rate_name == 0)) {
            $('input[name=item_rate_name]').focus();
            $('#item_rate_name_error').html('This field is required');
            console.log('error- 54');
            return false;
        }


        if (item_quantity_permission == 1 && (item_quantity_priority == "" || item_quantity_priority == 0)) {
            $('input[name=item_quantity_priority]').focus();
            $('#item_quantity_priorityerror').html('Priority cannot be 0 or blank');
            $("#item_quantity_priorityerror").addClass('set-erroe-custom');
            console.log('error- 55');
            return false;
        }
        if (item_quantity_permission == 1 && (item_quantity_name == "" || item_quantity_name == 0)) {
            $('input[name=item_quantity_name]').focus();
            $('#item_quantity_name_error').html('This field is required');
            console.log('error- 56');
            return false;
        }

        // console.log(items_permission,items_priority);

        if (items_permission == 1 && (items_priority == "" || items_priority == 0)) {
            $('input[name=items_priority]').focus();
            $('#items_priorityerror').html('Priority cannot be 0 or blank');
            $("#items_priorityerror").addClass('set-erroe-custom');
            console.log('error- 54' + (value != items_priority));
            return value != items_priority;
        }
        if (items_permission == 1 && (items_name == "" || items_name == 0)) {
            $('input[name=items_name]').focus();
            $('#items_name_error').html('This field is required');
            console.log('error- 57');
            return false;
        }

        if (bill_details_permission == 1 && (bill_details_priority == "" || bill_details_priority == 0)) {
            $('input[name=bill_details_priority]').focus();
            $('#bill_details_priorityerror').html('Priority cannot be 0 or blank');
            $('#bill_details_priorityerror').addClass('set-erroe-custom');
            console.log('error- 58');
            return false;
        }


        if (transactionid_permission == 1 && transactionid_name == "") {
            $('input[name=transactionid_name]').focus();
            $('#transactionid_name_error').html('This field is required');
            console.log('error- 59');
            return false;
        }
        if (transactionid_permission == 1 && (transactionid_priority == "" || transactionid_priority == 0)) {
            $('input[name=transactionid_priority]').focus();
            $('#transactionid_priorityerror').html('Priority cannot be 0 or blank');
            $("#transactionid_priorityerror").addClass('set-erroe-custom');
            console.log('error- 60');
            return false;
        }
        if (bill_number_permission == 1 && (bill_number_name == "" || bill_number_name == 0)) {
            $('input[name=bill_number_name]').focus();
            $('#bill_number__error').html('This field is required');
            console.log('error- 61');
            return false;
        }
        if (bill_number_permission == 1 && (bill_number_priority == "" || bill_number_priority == 0)) {
            $('input[name=bill_number_priority]').focus();
            $('#bill_number_priorityerror').html('Priority cannot be 0 or blank');
            $("#bill_number_priorityerror").addClass('set-erroe-custom');
            console.log('error- 62');
            return false;
        }
        if (bill_date_permission == 1 && (bill_date_name == "" || bill_date_name == 0)) {
            $('input[name=bill_date_name]').focus();
            $('#bill_date_name_error').html('This field is required');
            console.log('error- 63');
            return false;
        }
        if (bill_date_permission == 1 && (bill_date_priority == "" || bill_date_priority == 0)) {
            $('input[name=bill_date_priority]').focus();
            $('#bill_date_priorityerror').html('Priority cannot be 0 or blank');
            $("#bill_date_priorityerror").addClass('set-erroe-custom');
            console.log('error- 64');
            return false;
        }
        if (bill_time_permission == 1 && (bill_time_name == "" || bill_time_name == 0)) {
            $('input[name=bill_time_name]').focus();
            $('#bill_time_name_error').html('This field is required');
            console.log('error- 65');
            return false;
        }


        if (bill_time_permission == 1 && (bill_time_priority == "" || bill_time_priority == 0)) {
            $('input[name=bill_time_priority]').focus();
            $('#bill_time_priorityerror').html('Priority cannot be 0 or blank');
            $("#bill_time_priorityerror").addClass('set-erroe-custom');
            console.log('error- 66');
            return false;
        }

        if (section_permission == 1 && (section_name == "" || section_name == 0)) {
            $('input[name=section_name]').focus();
            $('#section_name_error').html('This field is required');
            console.log('error- 67');
            return false;
        }

        if (section_permission == 1 && (section_priority == "" || section_priority == 0)) {
            $('input[name=section_priority]').focus();
            $('#section_priorityerror').html('Priority cannot be 0 or blank');
            $("#section_priorityerror").addClass('set-erroe-custom');
            console.log('error- 68');
            return false;
        }



        if (table_permission == 1 && (table_name == "" || table_name == 0)) {
            $('input[name=table_name]').focus();
            $('#table_name_error').html('This field is required');
            console.log('error- 69');
            return false;
        }

        if (table_permission == 1 && (table_priority == "" || table_priority == 0)) {
            $('input[name=table_priority]').focus();
            $('#table_priorityerror').html('Priority cannot be 0 or blank');
            $('#table_priorityerror').addClass('set-erroe-custom');
            console.log('error- 70');
            return false;
        }
        if (server_permission == 1 && (server_name == "" || server_name == 0)) {
            $('input[name=server_name]').focus();
            $('#server_name_error').html('This field is required');
            console.log('error- 71');
            return false;
        }


        if (server_permission == 1 && (server_priority == "" || server_priority == 0)) {
            $('input[name=server_priority]').focus();
            $('#server_priorityerror').html('Priority cannot be 0 or blank');
            $('#server_priorityerror').addClass('set-erroe-custom');
            console.log('error- 72');
            return false;
        }


        if (service_permission == 1 && (service_name == "" || service_name == 0)) {
            $('input[name=service_name]').focus();
            $('#service_name_error').html('This field is required');
            console.log('error- 73');
            return false;
        }

        if (service_permission == 1 && (service_priority == "" || service_priority == 0)) {
            $('input[name=service_priority]').focus();
            $('#service_priorityerror').html('Priority cannot be 0 or blank');
            $("#service_priorityerror").addClass('set-erroe-custom');
            console.log('error- 74');
            return false;
        }
        if (channel_permission == 1 && (channel_name == "" || channel_name == 0)) {
            $('input[name=channel_name]').focus();
            $('#channel_name_error').html('This field is required');
            console.log('error- 75');
            return false;
        }

        if (channel_permission == 1 && (channel_priority == "" || channel_priority == 0)) {
            $('input[name=channel_priority]').focus();
            $('#channel_priorityerror').html('Priority cannot be 0 or blank');
            $("#channel_priorityerror").addClass('set-erroe-custom');
            console.log('error- 76');
            return false;
        }


        if (customer_name_permission == 1 && (customer_name_name == "" || customer_name_name == 0)) {
            $('input[name=customer_name_name]').focus();
            $('#customer_name_name_error').html('Priority cannot be 0 or blank');
            $('#customer_name_name_error').addClass('set-erroe-custom');
            console.log('error- 77');
            return false;
        }
        if (customer_name_permission == 1 && (customer_name_priority == "" || customer_name_priority == 0)) {
            $('input[name=customer_name_priority]').focus();
            $('#customer_name_priorityerror').html('Priority cannot be 0 or blank');
            $("#customer_name_priorityerror").addClass('set-erroe-custom');
            console.log('error- 78');
            return false;
        }

        if (customer_number_permission == 1 && (customer_number_name == "" || customer_number_name == 0)) {
            $('input[name=customer_number_name]').focus();
            $('#customer_number_name_error').html('This field is required');
            console.log('error- 79');
            return false;
        }


        if (customer_number_permission == 1 && (customer_number_priority == "" || customer_number_priority == 0)) {
            $('input[name=customer_number_priority]').focus();
            $('#customer_number_priorityerror').html('Priority cannot be 0 or blank');
            $("#customer_number_priorityerror").addClass('set-erroe-custom');
            console.log('error- 80');
            return false;
        }

        if (customer_gstin_permission == 1 && (customer_gstin_name == "" || customer_gstin_name == 0)) {
            $('input[name=customer_gstin_name]').focus();
            $('#customer_gstin_name_error').html('This field is required');
            console.log('error- 81');
            return false;
        }

        if (customer_gstin_permission == 1 && (customer_gstin_priority == "" || customer_gstin_priority == 0)) {
            $('input[name=customer_gstin_priority]').focus();
            $('#customer_gstin_priorityerror').html('Priority cannot be 0 or blank');
            $("#customer_gstin_priorityerror").addClass('set-erroe-custom');
            console.log('error- 82');
            return false;
        }

        if (customer_pan_permission == 1 && (customer_pan == "" || customer_pan == 0)) {
            $('input[name=customer_pan]').focus();
            $('#customer_pan_error').html('This field is required');
            console.log('error- 83');
            return false;
        }

        if (customer_pan_permission == 1 && (customer_pan_priority == "" || customer_pan_priority == 0)) {
            $('input[name=customer_pan_priority]').focus();
            $('#customer_pan_priorityerror').html('Priority cannot be 0 or blank');
            $("#customer_pan_priorityerror").addClass('set-erroe-custom');
            console.log('error- 84');
            return false;
        }

        if (customer_storename_permission == 1 && (customer_store_name == "" || customer_store_name == 0)) {
            $('input[name=customer_store_name]').focus();
            $('#customer_store_name_error').html('This field is required');
            console.log('error- 85');
            return false;
        }

        if (customer_storename_permission == 1 && (customer_storename_priority == "" || customer_storename_priority ==
                0)) {
            $('input[name=customer_storename_priority]').focus();
            $('#customer_storename_priorityerror').html('Priority cannot be 0 or blank');
            $("#customer_storename_priorityerror").addClass('set-erroe-custom');
            console.log('error- 86');
            return false;
        }

        if (item_details_permission == 1 && (item_details_priority == "" || item_details_priority == 0)) {
            $('input[name=item_details_priority]').focus();
            $('#item_details_priorityerror').html('Priority cannot be 0 or blank');
            $('#item_details_priorityerror').addClass('set-erroe-custom');
            console.log('error- 87');
            return false;
        }

        if (footnote_permission == 1 && footnote == "") {
            $('textarea[name=footnote]').focus();
            $('#footnote_error').html('This field is required');
            console.log('error- 88');
            return false;
        }
        //bb
        if (dynamic_banner_tile1_permission == 1 && (dynamic_banner_tile1_priority == "" ||
                dynamic_banner_tile1_priority == 0)) {
            $('input[name=dynamic_banner_tile1_priority]').focus();
            $('#dynamic_banner_tile1_priorityerror').html('Priority cannot be 0 or blank');
            $('#dynamic_banner_tile1_priorityerror').addClass('set-erroe-custom');
            console.log('error- 89');
            return false;
        }
        if (dynamic_banner_tile2_permission == 1 && (dynamic_banner_tile2_priority == "" ||
                dynamic_banner_tile2_priority == 0)) {
            $('input[name=dynamic_banner_tile2_priority]').focus();
            $('#dynamic_banner_tile2_priorityerror').html('Priority cannot be 0 or blank');
            $('#dynamic_banner_tile2_priorityerror').addClass('set-erroe-custom');
            console.log('error- 90');
            return false;
        }
        if (dynamic_banner_tile3_permission == 1 && (dynamic_banner_tile3_priority == "" ||
                dynamic_banner_tile3_priority == 0)) {
            $('input[name=dynamic_banner_tile3_priority]').focus();
            $('#dynamic_banner_tile2_priorityerror').html('Priority cannot be 0 or blank');
            $('#dynamic_banner_tile2_priorityerror').addClass('set-erroe-custom');
            console.log('error- 90');
            return false;
        }

        if (vrsn == 2) {
            if (link_feedback_permission == 1) {
                if (feedback_heading_text_permission == 1 && feedback_heading_text == "") {
                    $('input[name=feedback_heading_text]').focus();
                    $('#feedback_heading_text_error').html('Fill the feedback heading text field');
                    console.log('error- 91');
                    return false;
                }
                if (feedback_subheading_text_permission == 1 && feedback_subheading_text == "") {
                    $('input[name=feedback_subheading_text]').focus();
                    $('#feedback_subheading_text_error').html('Fill the feedback subheading text field');
                    console.log('error- 91');
                    return false;
                }
                if (Dynamic_feedback_permission == 1 && link_feedback == "") {
                    $('input[name=link_feedback]').focus();
                    $('#link_feedback_error').html('Fill the feedback dynamic text field');
                    console.log('error- 91');
                    return false;
                }
                if (Dynamic_feedback_permission != 1 && feedback_heading_text_permission != 1 &&
                    feedback_subheading_text_permission != 1) {
                    swal({
                        title: "Error",
                        text: "Please enable at least one field for the link feedback tile.",
                        timer: 2500
                    });
                    console.log('error- 91');
                    return false;
                }
                //console.log('error- 91');
                //return false;
            }
        } else {
            if (link_feedback_permission == 1 && link_feedback == "") {
                $('input[name=link_feedback]').focus();
                $('#link_feedback_error').html('Fill the feedback dynamic text field');
                console.log('error- 91');
                return false;
            }
            //return false;
        }

        if (link_feedback_permission == 1 && link_feedback_form == "") {
            $('select[name=link_feedback_form]').focus();
            $('#link_feedback_form_error').html('Select the feedback form');
            console.log('error- 92');
            return false;
        }

        if (banner_permission == 1 && (banner_priority == "" || banner_priority == 0)) {
            $('#bannerpriority_id').focus();
            $('#banner_priorityerror').html('This field cannot be blank');
            $('#banner_priorityerror').addClass('set-erroe-custom');
            console.log('error- 93');
            return false;
        }
        if (company_name_permission == 1 && company_name == "") {
            $('input[name=company_name]').focus();
            $('#company_nameerror').html('This field is required');
            console.log('error- 94');
            return false;
        }
        if (company_name_permission == 1 && company_name_heading == "") {
            $('input[name=company_name_heading]').focus();
            $('#company_name_headingerror').html('This field is required');
            console.log('error- 94');
            return false;
        }


        if (company_address1_permission == 1 && company_address1 == "") {
            $('input[name=company_address1]').focus();
            $('#company_address1error').html('This field is required');
            console.log('error- 95');
            return false;
        }
        var address_heading = $('input[name=address_heading]').val();
        if (company_address1_permission == 1 && address_heading == "") {
            $('input[name=address_heading]').focus();
            $('#address_headingerror').html('This field is required');
            console.log('error- 95');
            return false;
        }
        if (company_address1_permission == 1 && (address1_priority == "" || address1_priority == 0)) {
            $('input[name=address1_priority]').focus();
            $('#address1_priorityerror').html('Priority cannot be 0 or blank');
            $("#address1_priorityerror").addClass('set-erroe-custom');
            console.log('error- 96');
            return false;
        }
        if (company_address2_permission == 1 && company_address2 == "") {
            $('input[name=company_address2]').focus();
            $('#company_address2error').html('This field is required');
            console.log('error- 97');
            return false;
        }
        if (company_address2_permission == 1 && (address2_priority == "" || address2_priority == 0)) {
            $('input[name=address2_priority]').focus();
            $('#address2_priorityerror').html('Priority cannot be 0 or blank');
            $("#address2_priorityerror").addClass('set-erroe-custom');
            console.log('error- 98');
            return false;
        }
        if (company_address3_permission == 1 && company_address3 == "") {
            $('input[name=company_address3]').focus();
            $('#company_address3error').html('This field is required');
            console.log('error- 99');
            return false;
        }
        if (company_address3_permission == 1 && (address3_priority == "" || address3_priority == 0)) {
            $('input[name=address3_priority]').focus();
            $('#address3_priorityerror').html('Priority cannot be 0 or blank');
            $("#address3_priorityerror").addClass('set-erroe-custom');
            console.log('error- 100');
            return false;
        }
        if (gst_permission == 1 && gst_no == "") {
            $('input[name=gst_no]').focus();
            $('#gst_noerror').html('This field is required');
            console.log('error- 101');
            return false;
        }
        var gstin_heading = $('input[name=gstin_heading]').val();
        if (gst_permission == 1 && gstin_heading == "") {
            $('input[name=gstin_heading]').focus();
            $('#gstin_headingerror').html('This field is required');
            console.log('error- 101');
            return false;
        }
        if (gst_permission == 1 && (gst_priority == "" || gst_priority == 0)) {
            $('input[name=gst_priority]').focus();
            $('#gst_priorityerror').html('Priority cannot be 0 or blank');
            $("#gst_priorityerror").addClass('set-erroe-custom');
            console.log('error- 102');
            return false;
        }
        //newdata
        if (legal_name_permission == 1 && legal_name == "") {
            $('input[name=legal_name]').focus();
            $('#legal_nameerror').html('This field is required');
            console.log('error- 101');
            return false;
        }
        var legal_name_heading = $('input[name=legal_name_heading]').val();
        if (legal_name_permission == 1 && legal_name_heading == "") {
            $('input[name=legal_name_heading]').focus();
            $('#legal_name_headingerror').html('This field is required');
            console.log('error- 101');
            return false;
        }
        if (legal_name_permission == 1 && (legal_name_priority == "" || legal_name_priority == 0)) {
            $('input[name=legal_name_priority]').focus();
            $('#legal_name_priorityerror').html('Priority cannot be 0 or blank');
            $("#legal_name_priorityerror").addClass('set-erroe-custom');
            console.log('error- 102');
            return false;
        }
        if (outlet_location_permission == 1 && outlet_location == "") {
            $('input[name=outlet_location]').focus();
            $('#outlet_locationerror').html('This field is required');
            console.log('error- 101');
            return false;
        }

        //newdata
        if (company_number_permission == 1 && company_number == "") {
            $('input[name=company_number]').focus();
            $('#company_numbererror').html('This field is required');
            console.log('error- 103');
            return false;
        }
        var phone_no_heading = $('input[name=phone_no_heading]').val();
        if (company_number_permission == 1 && phone_no_heading == "") {
            $('input[name=phone_no_heading]').focus();
            $('#phone_no_headingerror').html('This field is required');
            console.log('error- 103');
            return false;
        }
        if (company_number_permission == 1 && (company_number_priority == "" || company_number_priority == 0)) {
            $('input[name=company_number_priority]').focus();
            $('#company_number_priorityerror').html('Priority cannot be 0 or blank');
            $("#company_number_priorityerror").addClass('set-erroe-custom');
            console.log('error- 104');
            return false;
        }

        if (banner_permission == 1) {
            //alert("ok");
            var Yajra_datatable_value = $('#banner_table_id').closest('.panel').find('.dataTables_empty').val();
            //alert(Yajra_datatable_value);
            if (Yajra_datatable_value == "") {
                //alert(Yajra_datatable_value);
                $('input[name=banner_permission]').focus();
                $('#banner_permissionerror').html('Please Add a Banner');
                console.log('error- 105');
                return false;
            }
        }
        //bb
        if (dynamic_banner_permission == 1) {

            var Yajra_datatable_value = $('#dynamic_banner_table_id > .dataTables_empty').val();
            if (Yajra_datatable_value == '') {
                $('input[name=dynamic_banner_permission]').focus();
                $('#dynamic_banner_permissionerror').html('Please Add a Banner');
                console.log('error- 106');
                return false;
            }
        }

        if (bar_code_permission == 1 && (bar_code_name == "" || bar_code_name == 0)) {
            $('input[name=bar_code_name]').focus();
            $('#bar_code_name_error').html('This field is required');
            console.log('error- 107');
            return false;
        }

        if (bar_code_permission == 1 && (bar_code_priority == "" || bar_code_priority == 0)) {
            $('input[name=bar_code_priority]').focus();
            $('#bar_code_priorityerror').html('Priority cannot be 0 or blank');
            $("#bar_code_priorityerror").addClass('set-erroe-custom');
            console.log('error- 108');
            return false;
        }
        if (item_tax_permission == 1 && (item_tax_name == "" || item_tax_name == 0)) {
            $('input[name=item_tax_name]').focus();
            $('#item_tax_name_error').html('This field is required');
            console.log('error- 109');
            return false;
        }
        if (item_tax_permission == 1 && (item_tax_priority == "" || item_tax_priority == 0)) {
            $('input[name=item_tax_priority]').focus();
            $('#item_tax_priorityerror').html('Priority  cannot be  0 or blank');
            $("#item_tax_priorityerror").addClass('set-erroe-custom');
            console.log('error- 110');
            return false;
        }
        if (hsn_code_permission == 1 && (hsn_code_name == "" || hsn_code_name == 0)) {
            $('input[name=hsn_code_name]').focus();
            $('#hsn_code_name_error').html('This field is required');
            console.log('error- 111');
            return false;
        }

        if (hsn_code_permission == 1 && (hsn_code_priority == "" || hsn_code_priority == 0)) {
            $('input[name=hsn_code_priority]').focus();
            $('#hsn_code_priorityerror').html('Priority cannot be 0 or blank');
            $("#hsn_code_priorityerror").addClass('set-erroe-custom');
            console.log('error- 112');
            return false;
        }
        if (item_discount_permission == 1 && (item_discount_name == "" || item_discount_name == 0)) {
            $('input[name=item_discount_name]').focus();
            $('#item_discount_name_error').html('This field is required');
            console.log('error- 113');
            return false;
        }
        if (rsp_permission == 1 && (item_rsv_name == "" || item_rsv_name == 0)) {
            $('input[name=item_rsv_name]').focus();
            $('#item_rsv_name_error').html('This field is required');
            console.log('error- 114');
            return false;
        }

        if (item_discount_permission == 1 && (item_discount_priority == "" || item_discount_priority == 0)) {
            $('input[name=item_discount_priority]').focus();
            $('#item_discount_priorityerror').html('Priority cannot be 0 or blank');
            $("#item_discount_priorityerror").addClass('set-erroe-custom');
            console.log('error- 115');
            return false;
        }

        if (rsp_permission == 1 && (rsp_priority == "" || rsp_priority == 0)) {
            $('input[name=item_rsv_priority]').focus();
            $('#rsp_priorityerror').html('Priority cannot be 0 or blank');
            $("#rsp_priorityerror").addClass('set-erroe-custom');
            console.log('error- 116');
            return false;
        }

        if (marked_price_permission == 1 && (marked_price_priority == "" || marked_price_priority == 0)) {
            $('input[name=marked_price_priority]').focus();
            $('#marked_price_priorityerror').html('Priority cannot be 0 or blank');
            $("#marked_price_priorityerror").addClass('set-erroe-custom');
            console.log('error- 117');
            return false;
        }
        if (marked_price_permission == 1 && (marked_price_name == "" || marked_price_name == 0)) {
            $('input[name=marked_price_name]').focus();
            $('#marked_price_name_error').html('This field is required');
            console.log('error- 118');
            return false;
        }




        if (delivery_address_details_permission == 1 && (delivery_address_details_priority == "" ||
                delivery_address_details_priority == 0)) {
            $('input[name=delivery_address_details_priority]').focus();
            $('#delivery_address_details_priorityerror').html('Priority cannot be 0 or blank');
            $('#delivery_address_details_priorityerror').addClass('set-erroe-custom');
            console.log('error- 119');
            return false;
        }

        if (delivery_address_permission == 1 && (delivery_address_priority == "" || delivery_address_priority == 0)) {
            $('input[name=delivery_address_priority]').focus();
            $('#delivery_address_priorityerror').html('Priority cannot be 0 or blank');
            $("#delivery_address_priorityerror").addClass('set-erroe-custom');
            console.log('error- 120');
            return false;
        }

        if (delivery_address_permission == 1 && delivery_address == "") {
            $('input[name=delivery_address]').focus();
            $('#delivery_address_error').html('This field is required');
            console.log('error- 121');
            return false;
        }

        if (pincode_permission == 1 && (pincode_priority == "" || pincode_priority == 0)) {
            $('input[name=pincode_priority]').focus();
            $('#pincode_priorityerror').html('Priority cannot be 0 or blank');
            $("#pincode_priorityerror").addClass('set-erroe-custom');
            console.log('error- 122');
            return false;
        }

        if (pincode_permission == 1 && pincode == "") {
            $('input[name=pincode]').focus();
            $('#pincode_error').html('This field is required');
            console.log('error- 123');
            return false;
        }

        if (city_permission == 1 && (city_priority == "" || city_priority == 0)) {
            $('input[name=city_priority]').focus();
            $('#city_priorityerror').html('Priority cannot be 0 or blank');
            $("#city_priorityerror").addClass('set-erroe-custom');
            console.log('error- 124');
            return false;
        }

        if (city_permission == 1 && city == "") {
            $('input[name=city]').focus();
            $('#city_error').html('This field is required');
            console.log('error- 125');
            return false;
        }


        if (landmark_permission == 1 && (landmark == "" || landmark == 0)) {
            $('input[name=landmark]').focus();
            $('#landmarkerror').html('This field is required');
            console.log('error- 126');
            return false;
        }


        if (landmark_permission == 1 && (landmark_priority == "" || landmark_priority == 0)) {
            $('input[name=landmark_priority]').focus();
            $('#landmark_priorityerror').html('Priority cannot be 0 or blank');
            $("#landmark_priorityerror").addClass('set-erroe-custom');
            console.log('error- 127');
            return false;
        }

        if (terms_and_condition_permission == 1 && (terms_and_conditions_priority == "" ||
                terms_and_conditions_priority == 0)) {
            $('input[name=terms_and_conditions_priority]').focus();
            $('#terms_and_conditions_priorityerror').html('Priority cannot be 0 or blank');
            $('#terms_and_conditions_priorityerror').addClass('set-erroe-custom');
            console.log('error- 128');
            return false;
        }


        if (t_and_c1_permission == 1 && t_and_c1 == "") {
            $('textarea[name=t_and_c1]').focus();
            $('#t_and_c1_error').html('This field is required');
            console.log('error- 129');
            return false;
        }
        if (t_and_c1_permission == 1 && (t_and_c1_priority == "" || t_and_c1_priority == 0)) {
            $('input[name=t_and_c1_priority]').focus();
            $('#t_and_c1_priorityerror').html('Priority cannot be 0 or blank');
            $("#t_and_c1_priorityerror").addClass('set-erroe-custom');
            console.log('error- 130');
            return false;
        }

        if (t_and_c2_permission == 1 && t_and_c2 == "") {
            $('textarea[name=t_and_c2]').focus();
            $('#t_and_c2_error').html('This field is required');
            console.log('error- 131');
            return false;
        }
        if (t_and_c2_permission == 1 && (t_and_c2_priority == "" || t_and_c2_priority == 0)) {
            $('input[name=t_and_c2_priority]').focus();
            $('#t_and_c2_priorityerror').html('Priority cannot be 0 or blank');
            $("#t_and_c2_priorityerror").addClass('set-erroe-custom');
            console.log('error- 132');
            return false;
        }

        if (t_and_c3_permission == 1 && t_and_c3 == "") {
            $('textarea[name=t_and_c3]').focus();
            $('#t_and_c3_error').html('This field is required');
            console.log('error- 133');
            return false;
        }
        if (t_and_c3_permission == 1 && (t_and_c3_priority == "" || t_and_c3_priority == 0)) {
            $('input[name=t_and_c3_priority]').focus();
            $('#t_and_c3_priorityerror').html('Priority cannot be 0 or blank');
            $("#t_and_c3_priorityerror").addClass('set-erroe-custom');
            console.log('error- 134');
            return false;
        }
        if (t_and_c4_permission == 1 && t_and_c4 == "") {
            $('textarea[name=t_and_c4]').focus();
            $('#t_and_c4_error').html('This field is required');
            console.log('error- 135');
            return false;
        }
        if (t_and_c4_permission == 1 && (t_and_c4_priority == "" || t_and_c4_priority == 0)) {
            $('input[name=t_and_c4_priority]').focus();
            $('#t_and_c4_priorityerror').html('Priority cannot be 0 or blank');
            $("#t_and_c4_priorityerror").addClass('set-erroe-custom');
            console.log('error- 136');
            return false;
        }


        if (t_and_c5_permission == 1 && t_and_c5 == "") {
            $('textarea[name=t_and_c5]').focus();
            $('#t_and_c5_error').html('This field is required');
            console.log('error- 137');
            return false;
        }
        if (t_and_c5_permission == 1 && (t_and_c5_priority == "" || t_and_c5_priority == 0)) {
            $('input[name=t_and_c5_priority]').focus();
            $('#t_and_c5_priorityerror').html('Priority cannot be 0 or blank');
            $("#t_and_c5_priorityerror").addClass('set-erroe-custom');
            console.log('error- 138');
            return false;
        }
        var display_points_summary_permission = 0;
        if ($('input[name=display_points_summary_permission]').is(':checked')) {
            display_points_summary_permission = 1;
        }
        var available_points_permission = 0;
        if ($('input[name=available_points_permission]').is(':checked')) {
            available_points_permission = 1;
        }
        var points_earned_permission = 0;
        if ($('input[name=points_earned_permission]').is(':checked')) {
            points_earned_permission = 1;
        }
        var points_redeem_permission = 0;
        if ($('input[name=points_redeem_permission]').is(':checked')) {
            points_redeem_permission = 1;
        }
        var points_expiry_permission = 0;
        if ($('input[name=points_expiry_permission]').is(':checked')) {
            points_expiry_permission = 1;
        }
        var available_points_name = $('input[name=available_points_name]').val();
        var points_earned_name = $('input[name=points_earned_name]').val();
        var points_redeem_name = $('input[name=points_redeem_name]').val();
        if (display_points_summary_permission == 1) {

            if (available_points_permission == 1 && available_points_name == "") {
                $('input[name=available_points_name]').focus();
                $('#available_points_name_error').html('This field is required.');
                console.log('error- 91');
                return false;
            }
            if (points_earned_permission == 1 && points_earned_name == "") {
                $('input[name=points_earned_name]').focus();
                $('#points_earned_name_error').html('This field is required.');
                console.log('error- 91');
                return false;
            }
            if (points_redeem_permission == 1 && points_redeem_name == "") {
                $('input[name=points_redeem_name]').focus();
                $('#points_redeem_name_error').html('This field is required.');
                console.log('error- 91');
                return false;
            }

            if (available_points_permission != 1 && points_earned_permission != 1 && points_redeem_permission != 1 &&
                points_expiry_permission != 1) {
                swal({
                    title: "Error",
                    text: "Please enable at least one field for point summary.",
                    timer: 2500
                });
                console.log('error- 91');
                return false;
            }
        }

        var coupon_details_permission = 0;
        if ($('input[name=coupon_details_permission]').is(':checked')) {
            coupon_details_permission = 1;
        }
        var active_coupon_permission = 0;
        if ($('input[name=active_coupon_permission]').is(':checked')) {
            active_coupon_permission = 1;
        }
        var on_hold_coupon_permission = 0;
        if ($('input[name=on_hold_coupon_permission]').is(':checked')) {
            on_hold_coupon_permission = 1;
        }
        if (coupon_details_permission == 1) {
            if (active_coupon_permission != 1 && on_hold_coupon_permission != 1) {
                swal({
                    title: "Error",
                    text: "Please enable at least one field for coupon details.",
                    timer: 2500
                });
                console.log('error- 91');
                return false;
            }
        }
        var referral_program_permission = 0;
        if ($('input[name=referral_program_permission]').is(':checked')) {
            referral_program_permission = 1;
        }
        if (referral_program_permission == 1) {

            if ($('input[name=referral_program_button_text]').val() == "") {
                $('input[name=referral_program_button_text]').focus();
                $('#referral_program_button_text_error').html('This field is required.');
                console.log('error- 91');
                return false;
            }
            if ($('input[name=referral_heading_text]').val() == "") {
                $('input[name=referral_heading_text]').focus();
                $('#referral_heading_text_error').html('This field is required.');
                console.log('error- 91');
                return false;
            }

            if ($('input[name=referralpopup]').val() == "") {
                $('input[name=referralpopup]').focus();
                $('#referral_program_text_error').html('This field is required.');
                console.log('error- 91');
                return false;
            }
            $('#referral_popup_message').keyup(function() {
                var data = this.value;
                //check ##Website Link## is not present in data
                if (data.indexOf('##Website Link##') == -1) {
                    $('#referral_website_link').hide();
                    $('#referral_website_link').val('');
                } else {
                    $('#referral_website_link').show();
                }

            });
            var referralMessage = $('#referral_popup_message').val();
            if (referralMessage.includes('##Website Link##')) {
                if ($('input[name=referral_website_link]').val() == "") {
                    $('input[name=referral_website_link]').focus();
                    $('#referral_website_link_error').html('This field is required.');
                    console.log('error- 91');
                    return false;
                }
            }
            if ($('input[name=referral_type]:checked').length == 0) {
                $('input[name=referral_type]').first().focus();
                $('#referral_type_error').html('Please select an option.');
                console.log('error- referral_type');
                return false;
            }



        }

        return true;
    }


    $(document).on('click', '#logo_permission_id', function(e) {
        if (vrsn == 2) {
            if ($("#logo_permission_id").is(":checked")) {
                $(".logo_details_collapse").addClass("in");
                if ($("#logoimage_collapse_id").is(":checked")) {
                    $(".logoimage_collapse").addClass("in");
                } else {
                    $(".logoimage_collapse").removeClass("in");
                }
            } else {
                $(".logo_details_collapse").removeClass("in");
            }
        } else {
            if ($("#logo_permission_id").is(":checked")) {
                $(".logo_details_collapse").addClass("in");
                $("#logo_image_size_v1").val(1);
            } else {
                $(".logo_details_collapse").removeClass("in");
                $("#logo_image_size_v1").val(0);
            }
        }
    });
    if (vrsn == 2) {
        if ($("#logo_permission_id").is(":checked")) {
            $(".logo_details_collapse").addClass("in");
            if ($("#logoimage_collapse_id").is(":checked")) {
                $(".logoimage_collapse").addClass("in");
            } else {
                $(".logoimage_collapse").removeClass("in");
            }
        } else {
            $(".logo_details_collapse").removeClass("in");
        }
    } else {
        if ($("#logo_permission_id").is(":checked")) {
            $(".logo_details_collapse").addClass("in");
            $("#logo_image_size_v1").val(1);
        } else {
            $(".logo_details_collapse").removeClass("in");
            $("#logo_image_size_v1").val(0);
        }
    }

    $(document).on('click', '#company_details_permission_id', function(e) {
        if ($("#company_details_permission_id").is(":checked")) {
            $(".company_details_collapse").addClass("in");
        } else {
            $(".company_details_collapse").removeClass("in");
        }
    });

    if ($("#company_details_permission_id").is(":checked")) {
        $(".company_details_collapse").addClass("in");
    } else {
        $(".company_details_collapse").removeClass("in");
    }

    $(document).on('click', '#bill_details_permission_id', function(e) {
        if ($("#bill_details_permission_id").is(":checked")) {
            $(".bill_details_collapse").addClass("in");
        } else {
            $(".bill_details_collapse").removeClass("in");
        }
    });

    if ($("#bill_details_permission_id").is(":checked")) {
        $(".bill_details_collapse").addClass("in");
    } else {
        $(".bill_details_collapse").removeClass("in");
    }
    //toolbar
    $(document).on('click', '#toolbar_permission_id', function(e) {
        if ($("#toolbar_permission_id").is(":checked")) {
            $(".toolbar_collapse").addClass("in");
        } else {
            $(".toolbar_collapse").removeClass("in");
        }
    });

    if ($("#toolbar_permission_id").is(":checked")) {
        $(".toolbar_collapse").addClass("in");
    } else {
        $(".toolbar_collapse").removeClass("in");
    }

    $(document).on('click', '#item_details_permission_id', function(e) {
        if ($("#item_details_permission_id").is(":checked")) {
            $(".item_details_collapse").addClass("in");
        } else {
            $(".item_details_collapse").removeClass("in");
        }
    });

    if ($("#item_details_permission_id").is(":checked")) {
        $(".item_details_collapse").addClass("in");
    } else {
        $(".item_details_collapse").removeClass("in");
    }


    $(document).on('click', '#footnote_permission_id', function(e) {
        if ($("#footnote_permission_id").is(":checked")) {
            $(".footnote_details_collapse").addClass("in");
        } else {
            $(".footnote_details_collapse").removeClass("in");
        }
    });

    if ($("#footnote_permission_id").is(":checked")) {
        $(".footnote_details_collapse").addClass("in");
    } else {
        $(".footnote_details_collapse").removeClass("in");
    }
    //bb logoimage_collapse
    $(document).on('click', '#social_link_permission_id', function(e) {
        if ($("#social_link_permission_id").is(":checked")) {
            $('#txtMobileNumber').css('padding-left', '78px');
            $(".social_link_details_collapse").addClass("in");
        } else {
            $(".social_link_details_collapse").removeClass("in");
        }
    });

    if ($("#social_link_permission_id").is(":checked")) {
        $('#txtMobileNumber').css('padding-left', '78px');
        $(".social_link_details_collapse").addClass("in");
    } else {
        $(".social_link_details_collapse").removeClass("in");
    }

    $(document).on('click', '#logoimage_collapse_id', function(e) {
        if ($("#logoimage_collapse_id").is(":checked")) {
            $(".logoimage_collapse").addClass("in");
        } else {
            $(".logoimage_collapse").removeClass("in");
        }
    });

    if ($("#logoimage_collapse_id").is(":checked")) {
        $(".logoimage_collapse").addClass("in");
    } else {
        $(".logoimage_collapse").removeClass("in");
    }




    //---MP(21.04.2023)---
    $(document).on('click', '#link_feedback_permission_id', function(e) {
        //$('#link_feedback_posisson_id').val("");
        //$('#link_feedback').val("");
        //$('#link_feedback_form').val("");
        if ($("#link_feedback_permission_id").is(":checked")) {
            $(".link_feedback_details_collapse").addClass("in");
        } else {
            $(".link_feedback_details_collapse").removeClass("in");
        }
    });

    if ($("#link_feedback_permission_id").is(":checked")) {
        $(".link_feedback_details_collapse").addClass("in");
    } else {
        $(".link_feedback_details_collapse").removeClass("in");
    }
    // --MP--

    $(document).on('click', '#banner_permission_id', function(e) {
        if ($("#banner_permission_id").is(":checked")) {
            $(".banner_details_collapse").addClass("inst");
        } else {
            $(".banner_details_collapse").removeClass("inst");
        }
    });

    if ($("#banner_permission_id").is(":checked")) {
        $(".banner_details_collapse").addClass("inst");
    } else {
        $(".banner_details_collapse").removeClass("inst");
    }
    //bb 
    $(document).on('click', '#Dynamic_banner_permission_id', function(e) {
        if ($("#Dynamic_banner_permission_id").is(":checked")) {
            $(".Dynamic_banner_details_collapse").addClass("inst");
            $("#dynamic_banner_permsn").val(1);

        } else {
            $(".Dynamic_banner_details_collapse").removeClass("inst");
            $("#dynamic_banner_permsn").val(0);
        }
    });

    if ($("#Dynamic_banner_permission_id").is(":checked")) {
        $(".Dynamic_banner_details_collapse").addClass("inst");
    } else {
        $(".Dynamic_banner_details_collapse").removeClass("inst");
    }

    $(document).on('click', '#banner_Image_tile1_id,#banner_Image_tile2_id,#banner_Image_tile3_id', function(e) {
        //alert('ok');
        var outletid = $(location).attr('href').split('/')[$(location).attr('href').split('/').length - 1];
        //alert(url);
        var xx = this;
        var yy = $(this).closest('.panel-ebill').find('#dynamic_bill_banner');
        var zz = $(this).closest(".panel-ebill").find("#remove_table_btn_id");
        $(zz).data('id', 2);
        //alert($(yy).data("id"));
        var Tilechk = 0;
        if ($(this).prop('checked') == true) {
            $("#dynamic_banner_tile_id_" + $(xx).data("id")).val(1);
            Tilechk = 1;
        } else {
            $("#dynamic_banner_tile_id_" + $(xx).data("id")).val(0);
        }
        $.ajax({
            type: "POST",
            url: "{{ url('add/dynamic_banner_tile') }}",
            data: {
                'data': Tilechk,
                'id': $(xx).data("id"),
                'outletid': outletid,
                _token: "{{ csrf_token() }}"
            },
            dataType: "json",
            success: function(response) {
                console.log(response.data);
                $(xx).data("id", response.data);
                var cls = "dttbl_" + response.data;
                $(xx).closest(".panel-body_remove").find("#dynamic_banner_table_id").addClass(cls);
                //alert($(xx).data("id"));
                $(yy).data("id", response.data);
                $(zz).data('id', response.data);
            },
            error: function(error) {
                console.log(error);
                alert('data not saved');
            }
        });

        if ($("#banner_Image_tile1_id").is(":checked")) {
            $("#collapseOne1").addClass("inst");
        } else {
            $("#collapseOne1").removeClass("inst");
        }

        if ($("#banner_Image_tile2_id").is(":checked")) {
            $("#collapseOne2").addClass("inst");
        } else {
            $("#collapseOne2").removeClass("inst");
        }

        if ($("#banner_Image_tile3_id").is(":checked")) {
            $("#collapseOne3").addClass("inst");
        } else {
            $("#collapseOne3").removeClass("inst");
        }
    });

    if ($("#banner_Image_tile1_id").is(":checked")) {
        $("#collapseOne1").addClass("inst");
    } else {
        $("#collapseOne1").removeClass("inst");
    }

    if ($("#banner_Image_tile2_id").is(":checked")) {
        $("#collapseOne2").addClass("inst");
    } else {
        $("#collapseOne2").removeClass("inst");
    }

    if ($("#banner_Image_tile3_id").is(":checked")) {
        $("#collapseOne3").addClass("inst");
    } else {
        $("#collapseOne3").removeClass("inst");
    }

    $(document).on('click', '#other_details_permission_id', function(e) {
        if ($("#other_details_permission_id").is(":checked")) {
            $(".other_details_collapse").addClass("in");
            $("#display_points_summary_permission").removeClass("chkbox_disabled").removeAttr("disabled");
            $("#sp_pntsmr").removeClass("company-set");
        } else {
            $(".other_details_collapse").removeClass("in");
            $("#display_points_summary_permission").prop("checked", false).addClass("chkbox_disabled").attr(
                "disabled", "disabled");
            $("#sp_pntsmr").addClass("company-set");
        }
    });

    if ($("#other_details_permission_id").is(":checked")) {
        $(".other_details_collapse").addClass("in");
    } else {
        $(".other_details_collapse").removeClass("in");
    }

    $(document).on('click', '#payment_details_permission_id', function(e) {
        if ($("#payment_details_permission_id").is(":checked")) {
            $(".payment_details_collapse").addClass("in");
        } else {
            $(".payment_details_collapse").removeClass("in");
        }
    });

    if ($("#payment_details_permission_id").is(":checked")) {
        $(".payment_details_collapse").addClass("in");
    } else {
        $(".payment_details_collapse").removeClass("in");
    }
    $('#myModal_addbanner [data-dismiss=modal]').on('click', function(e) {
        $("#add_banner_form_id").trigger("reset");
        $('#blah_add_banneradd_set').attr('src', "{{ asset('images/icon/Icons-01.png') }}");
        $('.clearimage_set').hide();
        $('#addpushimage_set').html('Add Image*');
        $('#add_banner_output_id').html('');

    })
    //bb
    $('#myModal_dynamicbanner [data-dismiss=modal]').on('click', function(e) {
        $("#dynamic_banner_form_id").trigger("reset");
        $('#dynamic_add_banneradd_set').attr('src', "{{ asset('images/icon/Icons-01.png') }}");
        $('.dynamic_clearimage_set').hide();
        $('#adddynamicimage_set').html('Add Image*');
        $('#add_dynamic_banner_output_id').html('');

    })


    $(document).on('click', '#terms_and_condition_permission_id', function(e) {
        if ($("#terms_and_condition_permission_id").is(":checked")) {
            $(".terms_details_collapse").addClass("in");
        } else {
            $(".terms_details_collapse").removeClass("in");
        }
    });

    if ($("#terms_and_condition_permission_id").is(":checked")) {
        $(".terms_details_collapse").addClass("in");
    } else {
        $(".terms_details_collapse").removeClass("in");
    }

    $(document).on('click', '#display_points_summary_permission', function(e) {
        if ($("#display_points_summary_permission").is(":checked")) {
            $(".points_summary_collapse").addClass("in");
        } else {
            $(".points_summary_collapse").removeClass("in");
        }
    });

    if ($("#display_points_summary_permission").is(":checked")) {
        $(".points_summary_collapse").addClass("in");
    } else {
        $(".points_summary_collapse").removeClass("in");
    }

    $(document).on('click', '#delivery_address_details_permission_id', function(e) {
        if ($("#delivery_address_details_permission_id").is(":checked")) {
            $(".delivery_address_collapse").addClass("in");
        } else {
            $(".delivery_address_collapse").removeClass("in");
        }
    });

    if ($("#delivery_address_details_permission_id").is(":checked")) {
        $(".delivery_address_collapse").addClass("in");
    } else {
        $(".delivery_address_collapse").removeClass("in");
    }







    // function banner_permission_validation(){
    // 	var banner_permission = 0;
    //   	if($('input[name=banner_permission]').is(":checked")){
    //   			banner_permission = 1;
    //   	}
    //   	if(banner_permission == 1){
    //   			$('input[name=banner_priority]').val(7);
    //   			return false;
    //   		}
    // } onclick="banner_permission_validation();"

    function table_permission_validation() {
        var table_permission = 0;
        if ($('input[name=table_permission]').is(":checked")) {
            table_permission = 1;
        }
        if (table_permission == 1) {
            $('input[name=table_name]').val('Table');
            $('input[name=table_priority]').val(6);
            return false;
        }
    }

    function server_permission_validation() {
        var server_permission = 0;
        if ($('input[name=server_permission]').is(":checked")) {
            server_permission = 1;
        }
        if (server_permission == 1) {
            $('input[name=server_name]').val('Server');
            $('input[name=server_priority]').val(7);
            return false;
        }
    }

    function service_permission_validation() {
        var service_permission = 0;
        if ($('input[name=service_permission]').is(":checked")) {
            service_permission = 1;
        }
        if (service_permission == 1) {
            $('input[name=service_name]').val('Service');
            $('input[name=service_priority]').val(8);
            return false;
        }
    }

    function channel_permission_validation() {
        var channel_permission = 0;
        if ($('input[name=channel_permission]').is(":checked")) {
            channel_permission = 1;
        }
        if (channel_permission == 1) {
            $('input[name=channel_name]').val('Channel');
            $('input[name=channel_priority]').val(9);
            return false;
        }
    }

    function amount_due_permission_validation() {
        var amount_due_permission = 0;
        if ($('input[name=amount_due_permission]').is(":checked")) {
            amount_due_permission = 1;
        }
        if (amount_due_permission == 1) {
            $('input[name=amount_due_name]').val('Amount Due');
            $('input[name=amount_due_priority]').val(2);
            return false;
        }
    }

    function section_permission_validation() {
        var section_permission = 0;
        if ($('input[name=section_permission]').is(":checked")) {
            section_permission = 1;
        }
        if (section_permission == 1) {
            $('input[name=section_name]').val('Section');
            $('input[name=section_priority]').val(5);
            return false;
        }
    }


    function toolbar_permission_validation() {
        var toolbar_permission = 0;
        if ($('input[name=toolbar_permission]').is(":checked")) {
            toolbar_permission = 1;
        }

        var home_priority = $('input[name=home_priority]').val();
        var login_priority = $('input[name=login_priority]').val();
        var menu_priority = $('input[name=menu_priority]').val();
        var share_priority = $('input[name=share_priority]').val();
        var save_priority = $('input[name=save_priority]').val();
        var website_priority = $('input[name=website_priority]').val();
        // alert(save_priority);

        if (toolbar_permission == 1 && (login_priority == 0 || login_priority == '') && (home_priority == 0 ||
                home_priority == '') && (menu_priority == 0 || menu_priority == '') && (share_priority == 0 ||
                share_priority == '') && (save_priority == 0 || save_priority == '') && (website_priority == 0 ||
                website_priority == '')) {
            $('input[name=home_priority]').val(1);
            $('input[name=login_priority]').val(2);
            $('input[name=menu_priority]').val(3);
            $('input[name=share_priority]').val(4);
            $('input[name=save_priority]').val(5);
            $('input[name=website_priority]').val(6);
            return false;
        }
    }


    // $('#add_banner_submit_id').on('click', function (e) {
    //     $("#add_banner_form_id").trigger("reset");
    // })
    $('#myModal_addbanner').on('hidden.bs.modal', function(e) {
        $("#add_banner_form_id").trigger("reset");
        $('#blah_add_banneradd_set').attr('src', "{{ asset('images/icon/Icons-01.png') }}");
        $('.clearimage_set').hide();
        $('#addpushimage_set').html('Add Image*');
        $('#add_banner_output_id').html('');
    })
    //bb
    $('#myModal_dynamicbanner').on('hidden.bs.modal', function(e) {
        $("#dynamic_banner_form_id").trigger("reset");
        $('#dynamic_add_banneradd_set').attr('src', "{{ asset('images/icon/Icons-01.png') }}");
        $('.dynamic_clearimage_set').hide();
        $('#adddynamicimage_set').html('Add Image*');
        $('#add_dynamic_banner_output_id').html('');
    })
    // var enableSubmit = function(ele) {
    //     $(ele).removeAttr("disabled");
    // }
    //     $("#add_banner_submit_id").click(function(e){
    //                 e.preventDefault(5000);
    //               var that = this;
    //               $(this).attr("disabled", true);
    //               setTimeout(function() { enableSubmit(that) }, 5000);
    //     })	

    function logo_permission_validation() {

        var logo_permission = 1;
        if ($('input[name=logo_permission]').not(':checked')) {
            logo_permission = 0;
        }
        if (logo_permission == 0) {
            $('#ebill_structure_submit_id').attr('disabled', false);
            $('#save_apply').attr('disabled', false);
        }
        // 	var logo_permission = 0;
        // 	if($('input[name=logo_permission]').is(':checked')){
        // 		logo_permission = 1;
        // 	}
        // 	if(logo_permission == 1){
        // 		$('#ebill_structure_submit_id').attr('disabled','disabled');
        // $('#save_apply').attr('disabled','disabled');
        // 	}
    }

    function item_name_permission() {
        var items_permission = 0;
        if ($('input[name=items_permission]').is(":checked")) {
            items_permission = 1;
        }
        if (items_permission == 1) {
            $(".item_class").show();
        } else {
            $(".item_class").hide();
        }
    }

    if ($('input[id="items_permission_id"]').is(":checked")) {
        $(".item_class").show();
    } else {
        $(".item_class").hide();
    }


    function banner_validation() {

        var elem = document.getElementById('blah_add_banneradd_set');
        if (elem.getAttribute('src') == "{{ asset('images/icon/Icons-01.png') }}") {
            $('input[name=banner_image_set]').focus();
            $('#addbannererror_modal').html('Please add an Image');
            return false;
        } else {
            return true;
        }
        //bb
        // function banner_validation(){

        // var elem = document.getElementById('dynamic_add_banneradd_set');
        // if(elem.getAttribute('src') == "{{ asset('images/icon/Icons-01.png') }}")
        if ($("#banner_Image_tile1_id").is(":checked")) {
            $('input[name=dynamic_banner_image_set]').focus();
            $('#addbannererror_modal_image').html('Please add an Image');
            return false;
        }

        // var banner_link = $('input[name=banner_link]').val();
        // alert(banner_link);

        // if(banner_link != "" ){
        //   			var url = document.getElementById("banner_link_id").value;
        //   			// alert(url);
        // 			var regexp = /^(?:(?:https?|ftp):\/\/)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})))(?::\d{2,5})?(?:\/\S*)?$/;
        // 			if (url != "") {
        //     			if (!regexp.test(url)) {
        //          		$('input[name=banner_link]').focus();
        //   					$('#add_banner_output_id').html("Please enter valid url.");
        //   					$('#add_banner_submit_id').attr("disabled", false);
        //   					return false;

        //          	}
        //     		}

        //   		}


        return true;
    }
    $('.all-enteradd').on('keyup keypress', function(e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) {
            e.preventDefault();
            return false;
        }
    });
    //bb
    // $('.all-enteradd').on('click', function(e) {
    //   if($(this).prop('checked')==false){
    //   	$(this).closest('.col-md-4').find('span').removeClass('set-erroe-custom').text('');
    //   }
    //});
    // $("#txtArea1").on("keypress",function(e) {
    //     var key = e.keyCode;
    //     if (key == 13) {
    //         document.getElementById("txtArea1").value =document.getElementById("txtArea1").value +"\n";
    //         return false;
    //     }
    //     else {
    //         return true;
    //     }
    // });
    // $("#txtArea2").on("keypress",function(e) {
    //     var key = e.keyCode;
    //     if (key == 13) {
    //         document.getElementById("txtArea2").value =document.getElementById("txtArea2").value + "\n";
    //         return false;
    //     }
    //     else {
    //         return true;
    //     }
    // });
    // $("#txtArea3").on("keypress",function(e) {
    //     var key = e.keyCode;
    //     if (key == 13) {
    //         document.getElementById("txtArea3").value =document.getElementById("txtArea3").value + "\n";
    //         return false;
    //     }
    //     else {
    //         return true;
    //     }
    // });
    // $("#txtArea4").on("keypress",function(e) {
    //     var key = e.keyCode;
    //     if (key == 13) {
    //         document.getElementById("txtArea4").value =document.getElementById("txtArea4").value + "\n";
    //         return false;
    //     }
    //     else {
    //         return true;
    //     }
    // });
    // $("#txtArea5").on("keypress",function(e) {
    //     var key = e.keyCode;
    //     if (key == 13) {
    //         document.getElementById("txtArea5").value =document.getElementById("txtArea5").value + "\n";
    //         return false;
    //     }
    //     else {
    //         return true;
    //     }
    // });



    $(document).on('click', '.update_check', function() {
        if ($(this).is(":checked")) {
            $('#update_reserv').show();
        } else if ($(this).is(":not(:checked)")) {
            $('#update_reserv').hide();
            $('#text_reserv').attr('readonly', true);
        }
    });
    $('#update_reserv').click(function() {
        $('#text_reserv').attr('readonly', false);
        $('#text_reserv').focus();
    });

    if ($("#ebillupdate_permission_id").is(":checked")) {
        $('#update_reserv').show();
    }
    if ($("#ebillupdate_permission_id").is(":not(:checked)")) {
        $('#update_reserv').hide();
        $('#text_reserv').attr('readonly', true);
    }
    $(document).on('click', '.mrprspchecked', function() {
        $('.mrprspchecked').not(this).prop('checked', false);
        // if($("input[name=marked_price_name]").is(":not(:checked)")){
        //    $("input[name=marked_price_name]").attr('readonly',true);
        // }
        // else if($("input[name=item_rsv_name]").is(":not(:checked)")){
        //    $("input[name=item_rsv_name]").attr('readonly',true);
        // }
    });
    //bb
    $(document).ready(function() {
        // $('#company_details_priority_id').on('keyup', function() {
        //     if ($('#company_details_priorityerror').length) {
        //         $('#company_details_priorityerror').html(""); 
        //         $("#company_details_priorityerror").removeClass('set-erroe-custom');
        //     }
        // });

        $('#bill_details_priority_id').on('keyup', function() {
            if ($('#bill_details_priorityerror').length) {
                $('#bill_details_priorityerror').html("");
                $("#bill_details_priorityerror").removeClass('set-erroe-custom');
            }
        });

        $('#delivery_address_details_priority_id').on('keyup', function() {
            if ($('#delivery_address_details_priorityerror').length) {
                $('#delivery_address_details_priorityerror').html("");
                $("#delivery_address_details_priorityerror").removeClass('set-erroe-custom');
            }
        });

        $('#item_details_priority_id').on('keyup', function() {
            if ($('#item_details_priorityerror').length) {
                $('#item_details_priorityerror').html("");
                $("#item_details_priorityerror").removeClass('set-erroe-custom');
            }
        });

        $('#other_details_priority_id').on('keyup', function() {
            if ($('#other_details_priorityerror').length) {
                $('#other_details_priorityerror').html("");
                $("#other_details_priorityerror").removeClass('set-erroe-custom');
            }
        });

        $('#payment_details_priority_id').on('keyup', function() {
            if ($('#payment_details_priorityerror').length) {
                $('#payment_details_priorityerror').html("");
                $("#payment_details_priorityerror").removeClass('set-erroe-custom');
            }
        });

        $('#ebill_updates_priority_id').on('keyup', function() {
            if ($('#ebill_updates_priority_priorityerror').length) {
                $('#ebill_updates_priority_priorityerror').html("");
                $("#ebill_updates_priority_priorityerror").removeClass('set-erroe-custom');
            }
        });

        $('#terms_and_conditions_priority_id').on('keyup', function() {
            if ($('#terms_and_conditions_priorityerror').length) {
                $('#terms_and_conditions_priorityerror').html("");
                $("#terms_and_conditions_priorityerror").removeClass('set-erroe-custom');
            }
        });

        $('#footnote_priority_id').on('keyup', function() {
            if ($('#footnote_priorityerror').length) {
                $('#footnote_priorityerror').html("");
                $("#footnote_priorityerror").removeClass('set-erroe-custom');
            }
        });
    });

    $(document).ready(function() {
        //Toolbar priority
        $('#home_priority_id').on('keyup', function() {
            if ($('#home_priorityerror').length) {
                $('#home_priorityerror').html("");
                $("#home_priorityerror").removeClass('set-erroe-custom');
            }
        });

        $('#login_priority_id').on('keyup', function() {
            if ($('#login_priorityerror').length) {
                $("#login_priorityerror").html('');
                $("#login_priorityerror").removeClass('set-erroe-custom');
            }
        });

        $('#menu_priority_id').on('keyup', function() {
            if ($('#menu_priorityerror').length) {
                $('#menu_priorityerror').html("");
                $("#menu_priorityerror").removeClass('set-erroe-custom');
            }
        });

        $('#website_priority_id').on('keyup', function() {
            if ($('#website_priorityerror').length) {
                $('#website_priorityerror').html("");
                $("#website_priorityerror").removeClass('set-erroe-custom');
            }
        });

        $('#share_priority_id').on('keyup', function() {
            if ($('#share_priorityerror').length) {
                $('#share_priorityerror').html("");
                $("#share_priorityerror").removeClass('set-erroe-custom');
            }
        });

        $('#save_priority_id').on('keyup', function() {
            if ($('#save_priorityerror').length) {
                $('#save_priorityerror').html("");
                $("#save_priorityerror").removeClass('set-erroe-custom');
            }
        });

        //Company Details priority
        $('#address1_priority_id').on('keyup', function() {
            if ($('#address1_priorityerror').length) {
                $('#address1_priorityerror').html("");
                $("#address1_priorityerror").removeClass('set-erroe-custom');
            }
        });

        $('#address2_priority_id').on('keyup', function() {
            if ($('#address2_priorityerror').length) {
                $('#address2_priorityerror').html("");
                $("#address2_priorityerror").removeClass('set-erroe-custom');
            }
        });

        $('#address3_priority_id').on('keyup', function() {
            if ($('#address3_priorityerror').length) {
                $('#address3_priorityerror').html("");
                $("#address3_priorityerror").removeClass('set-erroe-custom');
            }
        });

        $('#gst_priority_id').on('keyup', function() {
            if ($('#gst_priorityerror').length) {
                $('#gst_priorityerror').html("");
                $("#gst_priorityerror").removeClass('set-erroe-custom');
            }
        });

        $('#company_number_priority_id').on('keyup', function() {
            if ($('#company_number_priorityerror').length) {
                $('#company_number_priorityerror').html("");
                $("#company_number_priorityerror").removeClass('set-erroe-custom');
            }
        });
        //newdata
        $('#legal_name_priority_id').on('keyup', function() {
            if ($('#legal_name_priorityerror').length) {
                $('#legal_name_priorityerror').html("");
                $("#legal_name_priorityerror").removeClass('set-erroe-custom');
            }
        });

        //newdata
        //Bill Details priority

        $('#transactionid_priority_id').on('keyup', function() {
            if ($('#transactionid_priorityerror').length) {
                $('#transactionid_priorityerror').html("");
                $("#transactionid_priorityerror").removeClass('set-erroe-custom');
            }
        });

        $('#bill_number_priority_id').on('keyup', function() {
            if ($('#bill_number_priorityerror').length) {
                $('#bill_number_priorityerror').html("");
                $("#bill_number_priorityerror").removeClass('set-erroe-custom');
            }
        });

        $('#bill_date_priority_id').on('keyup', function() {
            if ($('#bill_date_priorityerror').length) {
                $('#bill_date_priorityerror').html("");
                $("#bill_date_priorityerror").removeClass('set-erroe-custom');
            }
        });

        $('#bill_time_priority_id').on('keyup', function() {
            if ($('#bill_time_priorityerror').length) {
                $('#bill_time_priorityerror').html("");
                $("#bill_time_priorityerror").removeClass('set-erroe-custom');
            }
        });

        $('#section_priority_id').on('keyup', function() {
            if ($('#section_priorityerror').length) {
                $('#section_priorityerror').html("");
                $("#section_priorityerror").removeClass('set-erroe-custom');
            }
        });

        $('#table_priority_id').on('keyup', function() {
            if ($('#table_priorityerror').length) {
                $('#table_priorityerror').html("");
                $("#table_priorityerror").removeClass('set-erroe-custom');
            }
        });

        $('#server_priority_id').on('keyup', function() {
            if ($('#server_priorityerror').length) {
                $('#server_priorityerror').html("");
                $("#server_priorityerror").removeClass('set-erroe-custom');
            }
        });

        $('#service_priority_id').on('keyup', function() {
            if ($('#service_priorityerror').length) {
                $('#service_priorityerror').html("");
                $("#service_priorityerror").removeClass('set-erroe-custom');
            }
        });

        $('#channel_priority_id').on('keyup', function() {
            if ($('#channel_priorityerror').length) {
                $('#channel_priorityerror').html("");
                $("#channel_priorityerror").removeClass('set-erroe-custom');
            }
        });

        $('#customer_name_priority_id').on('keyup', function() {
            if ($('#customer_name_priorityerror').length) {
                $('#customer_name_priorityerror').html("");
                $("#customer_name_priorityerror").removeClass('set-erroe-custom');
            }
        });

        $('#customer_number_priority_id').on('keyup', function() {
            if ($('#customer_number_priorityerror').length) {
                $('#customer_number_priorityerror').html("");
                $("#customer_number_priorityerror").removeClass('set-erroe-custom');
            }
        });

        $('#payment_mode_priority_id').on('keyup', function() {
            if ($('#payment_mode_priorityerror').length) {
                $('#payment_mode_priorityerror').html("");
                $("#payment_mode_priorityerror").removeClass('set-erroe-custom');
            }
        });

        $('#customer_gstin_priority_id').on('keyup', function() {
            if ($('#customer_gstin_priorityerror').length) {
                $('#customer_gstin_priorityerror').html("");
                $("#customer_gstin_priorityerror").removeClass('set-erroe-custom');
            }
        });

        $('#customer_pan_priority_id').on('keyup', function() {
            if ($('#customer_pan_priorityerror').length) {
                $('#customer_pan_priorityerror').html("");
                $("#customer_pan_priorityerror").removeClass('set-erroe-custom');
            }
        });

        $('#customer_storename_priority_id').on('keyup', function() {
            if ($('#customer_storename_priorityerror').length) {
                $('#customer_storename_priorityerror').html("");
                $("#customer_storename_priorityerror").removeClass('set-erroe-custom');
            }
        });
        //Delivery Address Details priority
        $('#delivery_address_priority_id').on('keyup', function() {
            if ($('#delivery_address_priorityerror').length) {
                $('#delivery_address_priorityerror').html("");
                $("#delivery_address_priorityerror").removeClass('set-erroe-custom');
            }
        });

        $('#city_priority_id').on('keyup', function() {
            if ($('#city_priorityerror').length) {
                $('#city_priorityerror').html("");
                $("#city_priorityerror").removeClass('set-erroe-custom');
            }
        });

        $('#pincode_priority_id').on('keyup', function() {
            if ($('#pincode_priorityerror').length) {
                $('#pincode_priorityerror').html("");
                $("#pincode_priorityerror").removeClass('set-erroe-custom');
            }
        });

        $('#landmark_priority_id').on('keyup', function() {
            if ($('#landmark_priorityerror').length) {
                $('#landmark_priorityerror').html("");
                $("#landmark_priorityerror").removeClass('set-erroe-custom');
            }
        });
        //Item Details priority
        $('#items_priority_id').on('keyup', function() {
            if ($('#items_priorityerror').length) {
                $('#items_priorityerror').html("");
                $("#items_priorityerror").removeClass('set-erroe-custom');
            }
        });

        $('#bar_code_priority_id').on('keyup', function() {
            if ($('#bar_code_priorityerror').length) {
                $('#bar_code_priorityerror').html("");
                $("#bar_code_priorityerror").removeClass('set-erroe-custom');
            }
        });

        $('#item_tax_priority_id').on('keyup', function() {
            if ($('#item_tax_priorityerror').length) {
                $('#item_tax_priorityerror').html("");
                $("#item_tax_priorityerror").removeClass('set-erroe-custom');
            }
        });

        $('#hsn_code_priority_id').on('keyup', function() {
            if ($('#hsn_code_priorityerror').length) {
                $('#hsn_code_priorityerror').html("");
                $("#hsn_code_priorityerror").removeClass('set-erroe-custom');
            }
        });

        $('#item_quantity_priority_id').on('keyup', function() {
            if ($('#item_quantity_priorityerror').length) {
                $('#item_quantity_priorityerror').html("");
                $("#item_quantity_priorityerror").removeClass('set-erroe-custom');
            }
        });

        $('#marked_price_priority_id').on('keyup', function() {
            if ($('#marked_price_priorityerror').length) {
                $('#marked_price_priorityerror').html("");
                $("#marked_price_priorityerror").removeClass('set-erroe-custom');
            }
        });

        $('#item_rate_priority_id').on('keyup', function() {
            if ($('#item_rate_priorityerror').length) {
                $('#item_rate_priorityerror').html("");
                $("#item_rate_priorityerror").removeClass('set-erroe-custom');
            }
        });

        $('#item_price_priority_id').on('keyup', function() {
            if ($('#item_price_priorityerror').length) {
                $('#item_price_priorityerror').html("");
                $("#item_price_priorityerror").removeClass('set-erroe-custom');
            }
        });

        $('#item_discount_priority_id').on('keyup', function() {
            if ($('#item_discount_priorityerror').length) {
                $('#item_discount_priorityerror').html("");
                $("#item_discount_priorityerror").removeClass('set-erroe-custom');
            }
        });

        $('#item_rsv_priority').on('keyup', function() {
            if ($('#rsp_priorityerror').length) {
                $('#rsp_priorityerror').html("");
                $("#rsp_priorityerror").removeClass('set-erroe-custom');
            }
        });
        //Other Details priority

        $('#sub_total_priority_id').on('keyup', function() {
            if ($('#sub_total_priorityerror').length) {
                $('#sub_total_priorityerror').html("");
                $("#sub_total_priorityerror").removeClass('set-erroe-custom');
            }
        });

        $('#tax_priority_id').on('keyup', function() {
            if ($('#tax_priorityerror').length) {
                $('#tax_priorityerror').html("");
                $("#tax_priorityerror").removeClass('set-erroe-custom');
            }
        });

        $('#charges_priority_id').on('keyup', function() {
            if ($('#charges_priorityerror').length) {
                $('#charges_priorityerror').html("");
                $("#charges_priorityerror").removeClass('set-erroe-custom');
            }
        });

        $('#discount_priority_id').on('keyup', function() {
            if ($('#discount_priorityerror').length) {
                $('#discount_priorityerror').html("");
                $("#discount_priorityerror").removeClass('set-erroe-custom');
            }
        });

        $('#points_redeemed_priority_id').on('keyup', function() {
            if ($('#points_redeemed_priorityerror').length) {
                $('#points_redeemed_priorityerror').html("");
                $("#points_redeemed_priorityerror").removeClass('set-erroe-custom');
            }
        });

        $('#gross_amount_priority_id').on('keyup', function() {
            if ($('#gross_amount_priorityerror').length) {
                $('#gross_amount_priorityerror').html("");
                $("#gross_amount_priorityerror").removeClass('set-erroe-custom');
            }
        });
        //Payment Details priority

        $('#netbill_paid_priority_id').on('keyup', function() {
            if ($('#netbill_paid_priorityerror').length) {
                $('#netbill_paid_priorityerror').html("");
                $("#netbill_paid_priorityerror").removeClass('set-erroe-custom');
            }
        });

        $('#amount_due_priority_id').on('keyup', function() {
            if ($('#amount_due_priorityerror').length) {
                $('#amount_due_priorityerror').html("");
                $("#amount_due_priorityerror").removeClass('set-erroe-custom');
            }
        });

        $('#amount_in_words_priority_id').on('keyup', function() {
            if ($('#amount_in_words_priorityerror').length) {
                $('#amount_in_words_priorityerror').html("");
                $("#amount_in_words_priorityerror").removeClass('set-erroe-custom');
            }
        });

        $('#roundoff_priority_id').on('keyup', function() {
            if ($('#roundoff_priorityerror').length) {
                $('#roundoff_priorityerror').html("");
                $("#roundoff_priorityerror").removeClass('set-erroe-custom');
            }
        });
        //Terms & Conditions priority

        $('#t_and_c1_priority_id').on('keyup', function() {
            if ($('#t_and_c1_priorityerror').length) {
                $('#t_and_c1_priorityerror').html("");
                $("#t_and_c1_priorityerror").removeClass('set-erroe-custom');
            }
        });

        $('#t_and_c2_priority_id').on('keyup', function() {
            if ($('#t_and_c2_priorityerror').length) {
                $('#t_and_c2_priorityerror').html("");
                $("#t_and_c2_priorityerror").removeClass('set-erroe-custom');
            }
        });

        $('#t_and_c3_priority_id').on('keyup', function() {
            if ($('#t_and_c3_priorityerror').length) {
                $('#t_and_c3_priorityerror').html("");
                $("#t_and_c3_priorityerror").removeClass('set-erroe-custom');
            }
        });

        $('#t_and_c4_priority_id').on('keyup', function() {
            if ($('#t_and_c4_priorityerror').length) {
                $('#t_and_c4_priorityerror').html("");
                $("#t_and_c4_priorityerror").removeClass('set-erroe-custom');
            }
        });

        $('#t_and_c5_priority_id').on('keyup', function() {
            if ($('#t_and_c5_priorityerror').length) {
                $('#t_and_c5_priorityerror').html("");
                $("#t_and_c5_priorityerror").removeClass('set-erroe-custom');
            }
        });
        // head
        $('#dynamic_bill_banner_id1').on('keyup', function() {
            if ($('#dynamic_banner_tile1_priorityerror').length) {
                $('#dynamic_banner_tile1_priorityerror').html("");
                $("#dynamic_banner_tile1_priorityerror").removeClass('set-erroe-custom');
            }
        });
        $('#display_point_summary_priority').on('keyup', function() {
            if ($('#display_point_summary_priorityerror').length) {
                $('#display_point_summary_priorityerror').html("");
                $("#display_point_summary_priorityerror").removeClass('set-erroe-custom');
            }
        });
        $('#dynamic_bill_banner_id2').on('keyup', function() {
            if ($('#dynamic_banner_tile2_priorityerror').length) {
                $('#dynamic_banner_tile2_priorityerror').html("");
                $("#dynamic_banner_tile2_priorityerror").removeClass('set-erroe-custom');
            }
        });

        $('#dynamic_bill_banner_id3').on('keyup', function() {
            if ($('#dynamic_banner_tile3_priorityerror').length) {
                $('#dynamic_banner_tile3_priorityerror').html("");
                $("#dynamic_banner_tile3_priorityerror").removeClass('set-erroe-custom');
            }
        });
        var banner_count = $('.clbnrimg').length;
        // $("#add_another_banner").click(function(){

        // });
        if (banner_count == 3) {
            $(".add-anothet-var").addClass("addnewitem-disabled");
        }
    });

    //bb
    //var banner_count = 1 ;


    // function removeVariantType(param) {
    //     $(param).closest('div.add-append-text').remove();
    //     banner_count--;
    //     adddata_append();
    //     if(banner_count <3)
    //      {
    //         $(".add-anothet-var").removeClass("addnewitem-disabled");
    //      }
    // }

    //  $(document).on('click', '#add_another_banner', function() {
    //  	alert('ok');
    // });
    //var addButton = document.getElementByClassName("clbnrimg");

    //addButton.addEventListener("click", function() {
    // $(document).on("click",".clbnrimg", function() {
    // 	var bnnr_layout=$(this).closest('.home-table').find('#dynamic_banner_layout').val();
    // 	alert(bnnr_layout);
    // 	if(bnnr_layout==0 || bnnr_layout==""){
    // 		var popup = document.createElement("div");
    // 		popup.className = "popup";

    // 		var heading = document.createElement("h2");
    // 		heading.innerHTML = "Select Banner Layout";
    // 		popup.appendChild(heading);

    // 		var singleBannerRadio = document.createElement("input");
    // 		singleBannerRadio.type = "radio";
    // 		singleBannerRadio.name = "bannerType";
    // 		singleBannerRadio.value = "single";
    // 		singleBannerRadio.id = "single_banner";
    // 		var singleBannerLabel = document.createElement("label");
    // 		singleBannerLabel.innerHTML = "Single Banner- single Tile";
    // 		singleBannerLabel.setAttribute("for", "single_banner");

    // 		var doubleBannerRadio = document.createElement("input");
    // 		doubleBannerRadio.type = "radio";
    // 		doubleBannerRadio.name = "bannerType";
    // 		doubleBannerRadio.value = "double";
    // 		doubleBannerRadio.id = "double_banner";
    // 		var doubleBannerLabel = document.createElement("label");
    // 		doubleBannerLabel.innerHTML = "Double Banner-single Tile";
    // 		doubleBannerLabel.setAttribute("for", "double_banner");

    // 		var hiddenBannerTypeInput = document.createElement("input");
    // 		hiddenBannerTypeInput.type = "hidden";
    // 		hiddenBannerTypeInput.name = "banner_type";

    // 		popup.appendChild(singleBannerRadio);
    // 		popup.appendChild(singleBannerLabel);
    // 		popup.appendChild(doubleBannerRadio);
    // 		popup.appendChild(doubleBannerLabel);

    // 		popup.appendChild(hiddenBannerTypeInput);

    // 		var saveButton = document.createElement("button");
    // 		saveButton.innerHTML = "Submit";
    // 		saveButton.addEventListener("click", function() {
    // 			var selectedBannerType = document.querySelector('input[name="bannerType"]:checked').value;

    // 			hiddenBannerTypeInput.value = selectedBannerType;

    // 			if (selectedBannerType === "single") {
    // 				//console.log("Single Banner selected. Save logic for single banner.");
    // 				alert("Not allowed");
    // 			} else if (selectedBannerType === "double") {
    // 				//console.log("Double Banner selected. Save logic for double banner.");
    // 				if(banner_count < 4 ) {
    // 						var $addinput = $('<div class="panel-body_remove"><div class="panel-ebill"><label class="pure-material-checkbox"><input id="banner_Image_tile2_id" class="all-enteradd" type="checkbox" name="dynamic_banner_tile2_permission" data-id="0" value="1" {{ $ebillStructure->dynamic_banner_tile2_permission == 1 ? 'checked' : '' }}><span>Banner Image</span></label><div class="button-container"><button class="remove-table-btn" id="remove_table_btn_id">X</button></div><div id="collapseOne" class="banner_image_details_collapse panel-collapse collapsest inst"><div class="home-table"><a class="new-outlet-banner new-outlet clbnrimg" id="dynamic_bill_banner" href="javascript:void(0)" data-id="0">Add</a><div class="col-md-offset-6 col-md-2" style="float: right;"><input type="hidden" name="totalVarNameb[]" value="1"><input type="text" id="dynamic_bill_banner_id2" class="form-control all-enteradd cl_priority" placeholder="Priority" name="dynamic_banner_tile2_priority" onkeypress="return isNumberKey(event);" maxlength="1" value="{{ $ebillStructure->dynamic_banner_tile2_priority }}"><span id="dynamic_banner_tile2_priorityerror"></span></div><span class="category-error" id="banner_permissionerror"></span><div class="clearfix"></div><table id="dynamic_banner_table_id" class="table table-striped table-bordered" style="width: 100%;"><thead><tr><th>Image</th><th>Image Linking URL</th><th>Tag Text</th><th>Tag Linking URL</th><th>Priority</th><th>Status</th></tr></thead><tbody></tbody></table></div></div></div><div class="add-append-text col-md-12"></div></div>');
    // 						$("#banner_type_main").append($addinput);
    // 						banner_count=banner_count+1;
    // 						if(banner_count == 3) {
    // 							$(".add-anothet-var").addClass("addnewitem-disabled");
    // 						}
    // 						var totalVarNameArr = $("input[name='totalVarNameb[]']").val();
    // 					}
    // 					banner_count++;  
    // 			}

    // 			popup.remove();
    // 		});

    // 		popup.appendChild(saveButton);

    // 		document.body.appendChild(popup);
    // 	}
    // });

    if (vrsn == 2) {
        var addButton = document.getElementById("add_another_banner");

        addButton.addEventListener("click", function() {
            banner_count = $('.clbnrimg').length;
            //alert(banner_count);
            if (banner_count < 3) {
                var $addinput = $(
                    '<div class="panel-body_remove"><div class="panel-ebill"><label class="pure-material-checkbox"><input id="banner_Image_tile' +
                    (banner_count + 1) +
                    '_id" class="all-enteradd clchkprmsn" type="checkbox" name="dynamic_banner_tile' + (
                        banner_count + 1) +
                    '_permission" data-id="0" value="1" {{ $ebillStructure->dynamic_banner_tile2_permission == 1 ? 'checked' : '' }}><span>Banner Image</span></label><div class="button-container"><button class="remove-table-btn" id="remove_table_btn_id">X</button></div><div id="collapseOne' +
                    (banner_count + 1) +
                    '" class="banner_image_details_collapse panel-collapse collapsest01"><div class="home-table"><a class="new-outlet-banner new-outlet clbnrimg" id="dynamic_bill_banner" href="javascript:void(0)" data-id="0">Add</a><span class="category-error dyenerr" id="dynamic_banner_permissionerror"></span><div class="col-md-offset-6  col-md-3"><input type="text" id="dynamic_banner_layout" class="form-control all-enteradd none" placeholder="Banner Layout" name="dynamic_banner_layout" value="" style="float: right;" disabled="" fdprocessedid="d30gai"></div><div class="col-md-2" style="float: right;"><input type="hidden" name="totalVarNameb[]" value="1"><input type="hidden" class="clrmvbnr" name="rmvbnr[]" value="0"><input type="text" id="dynamic_bill_banner_id' +
                    (banner_count + 1) +
                    '" class="form-control all-enteradd cl_priority" placeholder="Priority" name="dynamic_banner_tile[]" onkeypress="return isNumberKey(event);" maxlength="2" value="0"><input type="hidden" name="dynamic_banner_tile_id[]" value=""><span id="dynamic_banner_tile' +
                    (banner_count + 1) + 
                    '_priorityerror"></span></div><div class="clearfix"></div><table id="dynamic_banner_table_id" class="table table-striped table-bordered bnrtbl" style="width: 100%;"><thead><tr><th>Image</th><th>Image Linking URL</th><th>Tag Text</th><th>Tag Linking URL</th><th>Priority</th><th>Status</th></tr></thead><tbody></tbody></table></div></div></div><div class="add-append-text col-md-12"></div></div>'
                    );
                $("#banner_type_main").append($addinput);
                banner_count = banner_count + 1;
                if (banner_count == 3) {
                    $(".add-anothet-var").addClass("addnewitem-disabled");
                }
                var totalVarNameArr = $("input[name='totalVarNameb[]']").val();
            }
            banner_count++;
        });
    }

    //bb edit
    $(document).on("click", "#dynamic_bill_banner_edit", function() {
        $("#myModal_dynamicbanner_edit").modal("show");

    });

    $('#dynamic_image_url_id').change(function() {
        var myVariable = $(this).val().trim();
        if ($(this).val().trim() == "" || (
                /^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/
                .test(myVariable))) {
            $('#adddynbnrimgurl').text("");
        }
    });

    $('#dynamic_tag_url_id').change(function() {
        var myVariable = $(this).val().trim();
        if ($(this).val().trim() == "" || (
                /^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/
                .test(myVariable))) {
            $('#adddynbnrtagurl').text("");
        }
    });

    $('#dynamic_tag_text_id').change(function() {
        if ($(this).val().trim()) {
            $('#adddynbnrtagtxt').text("");
        }
    })

    $(document).on('click', '#add_dynamic_banner_submit_id', function(e) {
        //alert('ok');
        e.preventDefault();
        var btn = $(this);
        var tile_id = $('#banner_tile').val();
        if ($('#dynamic_imgInp_add_banneradd_set').val() != "") {
            if ($('#dynamic_bannpriority').val().trim() != "") {
                if ($('#dynamic_image_url_id').val().trim() != "") {
                    var myVariable = $('#dynamic_image_url_id').val().trim();
                    var urlPattern = /^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,})([\/\w \.-]*)*\/?$/;
                    if (urlPattern.test(myVariable)) {
                        $('#adddynbnrimgurl').text("");
                    } else {
                        $('#adddynbnrimgurl').text("URL for image  is not in the  correct format");
                        return false;
                    }
                }

                //if($('#dynamic_image_url_id').val().trim()!=""){
                if (($('#dynamic_tag_text_id').val().trim() != "" && $('#dynamic_tag_url_id').val().trim() !=
                        "") || ($('#dynamic_tag_text_id').val().trim() == "" && $('#dynamic_tag_url_id').val()
                        .trim() == "")) {
                    //if($('#dynamic_tag_url_id').val().trim()!=""){
                    if ($('#dynamic_tag_url_id').val().trim() != "") {
                        var myVariable = $('#dynamic_tag_url_id').val().trim();
                        var urlPattern = /^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,})([\/\w \.-]*)*\/?$/;
                        if (urlPattern.test(myVariable)) {
                            //alert("valid url");
                            $('#adddynbnrtagurl').text("");
                        } else {
                            // swal({
                            // 	title: "Success",
                            // 	text: "Tag url is not correct format",
                            // 	timer: 2500
                            // });
                            $('#adddynbnrtagurl').text("URL for tag  is not in the  correct format");
                            return false;
                        }
                    }
                    $(btn).attr('disabled', 'disabled');
                    //var tile_id=$('#banner_tile').val();
                    var form = $('#dynamic_banner_form_id')[0];
                    var data = new FormData(form);
                    //console.log(data);
                    $.ajax({
                        type: "POST",
                        url: "{{ url('add/dynamic') }}",
                        data: data,
                        datatype: "json",
                        processData: false,
                        contentType: false,
                        cache: false,
                        async: false,
                        success: function(response) {
                            //alert('ok');
                            console.log(response)
                            if (response.status == 200) {
                                //alert(response.message);
                                swal({
                                    title: "Success",
                                    text: response.message,
                                    timer: 2500
                                });
                            }
                            Dttblbind();
                            $("#myModal_dynamicbanner").modal("hide");
                            $("#dynamic_banner_form_id")[0].reset();
                            //window.location.reload();	
                            $('.dyenerr').each(function() {
                                //alert("ok");
                                $(this).html("");
                            });

                            $(btn).removeAttr('disabled');
                        },
                        error: function(error) {
                            alert('Data not saved');
                            $(btn).removeAttr('disabled');
                        }
                    });
                    // 		}
                    // 		else{
                    // 			alert("Tag url is required");
                    // 		}	
                } else {
                    if ($('#dynamic_tag_text_id').val().trim() == "") {
                        //alert("Tag text is required");
                        // swal({
                        // 	title: "Success",
                        // 	text: "Tag text is required",
                        // 	timer: 2500
                        // });
                        $('#adddynbnrtagtxt').text("Tag text is required");
                    }
                    if ($('#dynamic_tag_url_id').val().trim() == "") {
                        //alert("Tag url is required");
                        // swal({
                        // 	title: "Success",
                        // 	text: "Tag url is required",
                        // 	timer: 2500
                        // });
                        $('#adddynbnrtagurl').text("Tag url is required");
                    } else {
                        var myVariable = $('#dynamic_tag_url_id').val().trim();
                        if (/^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/
                            .test(myVariable)) {
                            $('#adddynbnrtagurl').text("");
                        } else {
                            // swal({
                            // 	title: "Success",
                            // 	text: "Tag url is not correct format",
                            // 	timer: 2500
                            // });
                            $('#adddynbnrtagurl').text("URL for tag  is not in the  correct format");
                            return false;
                        }
                    }
                }
                // }
                // else{
                // 	alert("Dynamic image Url is required");
                // }
            } else {
                //alert("Banner priority is required");
                // swal({
                // 	title: "Success",
                // 	text: "Banner priority is required",
                // 	timer: 2500
                // });
                $('#adddynbannerpriorityerror').text("Banner priority is required");
            }
        } else {
            //alert("Banner image is required");
            // swal({
            // 	title: "Success",
            // 	text: "Banner image is required",
            // 	timer: 2500
            // });
            $('#dynamic_bannererror_modal_image').text("Banner image is required");
        }
    });


    function Dttblbind() {
        //alert('ok');
        var outletid = $('#outlet_id').val();
        var tile_id = $('#banner_tile').val();
        //$('.dttbl_'+tile_id).dataTable().fnDestroy();
        //$('.dttbl_'+tile_id).DataTable().ajax.reload();
        var layout = $('.dttbl_' + tile_id).closest('.home-table').find('#dynamic_banner_layout').val() ==
            "Single Banner- single Tile" ? 1 : 2;
        //alert(outletid);
        //alert(tile_id);
        //document.getElementByClassName()
        // $('.dttbl_'+tile_id).DataTable({
        //var _dttbl = document.getElementsByClassName("myButton");
        $('.dttbl_' + tile_id).DataTable({
            destroy: true,
            processing: true,
            serverSide: true,
            responsive: true,
            ordering: false,
            bFilter: false,
            "bProcessing": true,
            "bLengthChange": true,
            "bPaginate": false,
            "info": false,
            "paging": false,
            ajax: {
                url: "{{ url('datatable/dynamic_banner_list') }}",
                data: {
                    'outletid': outletid,
                    'tile_id': tile_id
                }
            },
            "fnCreatedRow": function(nRow, data, iDataIndex) {
                $(nRow).attr('id', "tr_" + data.id);
            },
            "columnDefs": [{
                    "width": "20%",
                    "targets": 0
                },
                {
                    "width": "15%",
                    "targets": 1
                },
                {
                    "width": "25%",
                    "targets": 2
                },
                {
                    "width": "20%",
                    "targets": 3
                },
                {
                    "width": "10%",
                    "targets": 4
                },
                {
                    "width": "10%",
                    "targets": 5
                }
            ],
            columns: [

                {
                    data: 'banner_image',
                    name: 'wl_outlet_banner.banner_image',
                    orderable: false,
                    searchable: false,
                    render: function(data, type, full, meta) {
                        if (data != '') {
                            return '<img src="' + data +
                                '" style="width:70px !important; height:70px !important;margin: 0px auto;display: block;">';
                        }
                    }
                },
                {
                    data: 'banner_link',
                    name: 'wl_outlet_banner.banner_link'
                },
                {
                    data: 'banner_tag_text',
                    name: 'wl_outlet_banner.banner_tag_text'
                },
                {
                    data: 'banner_tag_linking_url',
                    name: 'wl_outlet_banner.banner_tag_linking_url'
                },
                {
                    data: 'banner_priority',
                    name: 'wl_outlet_banner.banner_priority'
                },
                {
                    data: 'id',
                    name: 'wl_outlet_banner.id',
                    orderable: false,
                    searchable: false,
                    render: function(data, type, full, meta) {
                        return '<a href="javascript:void(0)" class="editbanner" data-id="' + data.id +
                            '" onclick="fnEdit(' + data + ',' + layout +
                            ')">Edit</a> | <a href="javascript:void(0)" style="color: red !important;" onclick="fnDelete(' +
                            data + ')" class="deletebanner" data-id="' + data + '">Delete</a>';
                    }
                },
            ],
        });
    }
    //bb
    //$(document).on('click','#dynamic_bill_banner_edit',function(){
    function fnEdit(id, layout_val) {
        //alert(layout_val);
        $('#tile_banner_layout').val(layout_val);
        if (layout_val == 2) {
            //$('#tile_banner_layout').val(2);
            $('.Edit_img_rto').html("4:3");
            $('.Edit_img_dmn').html("640X480");
        } else {
            //$('#tile_banner_layout').val(1);
            $('.Edit_img_rto').html("5:2");
            $('.Edit_img_dmn').html("500X200");
        }
        $.ajax({
            type: "get",
            url: "{{ url('edit/dynamic') }}/" + id,
            // data:{id:id},
            datatype: "json",
            processData: false,
            contentType: false,
            cache: false,
            success: function(response) {
                console.log(response);
                if (response.status == 200) {
                    $('#outlet_edit_id').val(id);
                    $('#edit_dynamic_bannpriority').val(response.data.banner_priority);
                    $('#edit_dynamic_image_url_id').val(response.data.banner_link);
                    $('#edit_dynamic_tag_text_id').val(response.data.banner_tag_text);
                    $('#edit_dynamic_tag_url_id').val(response.data.banner_tag_linking_url);
                    $("#dynamic_edit_banneradd_set").attr("src", response.data.banner_image);
                    if (response.data.banner_image != "") {
                        $("#editdynamicimage_set").text("Change Image");
                        //$('#addpushimage_set_edit').html('Change Image');
                    }

                    // $('#dynamic_edit_banneradd_set').val(response.data.banner_image);
                }
            },
            error: function(error) {
                alert('not updatedata');
            }
        });
    }
    //});

    $('#edit_dynamic_image_url_id').change(function() {
        var myVariable = $(this).val().trim();
        if ($(this).val().trim() == "" || (
                /^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/
                .test(myVariable))) {
            $('#editdynbnrimgurl').text("");
        }
    });

    $('#edit_dynamic_tag_url_id').change(function() {
        var myVariable = $(this).val().trim();
        if ($(this).val().trim() == "" || (
                /^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/
                .test(myVariable))) {
            $('#editdynbnrtagurl').text("");
        }
    });

    $('#edit_dynamic_tag_text_id').change(function() {
        if ($(this).val().trim()) {
            $('#editdynbnrtagtxt').text("");
        }
    });

    $(document).on('click', '#edit_dynamic_banner_submit_id', function(e) {
        e.preventDefault();
        var id = $('#outlet_edit_id').val();
        //alert(id);
        var btn = $(this);
        if ($('#edit_dynamic_image_url_id').val().trim() != "") {
            var myVariable = $('#edit_dynamic_image_url_id').val().trim();
            var urlPattern = /^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,})([\/\w \.-]*)*\/?$/;
            if (urlPattern.test(myVariable)) {
                //alert("valid url");
            } else {
                // swal({
                // 	title: "Success",
                // 	text: "Image url is not correct format",
                // 	timer: 2500
                // });
                $("#editdynbnrimgurl").text("URL for image  is not in the  correct format");
                return false;
            }
        }
        //if($('#dynamic_imgInp_edit_banneradd_set').val()!=""){
        if (($('#edit_dynamic_tag_text_id').val().trim() != "" && $('#edit_dynamic_tag_url_id').val().trim() !=
                "") || ($('#edit_dynamic_tag_text_id').val().trim() == "" && $('#edit_dynamic_tag_url_id').val()
                .trim() == "")) {
            if ($('#edit_dynamic_tag_url_id').val().trim() != "") {
                var myVariable3 = $('#edit_dynamic_tag_url_id').val().trim();
                var urlPattern = /^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,})([\/\w \.-]*)*\/?$/;
                if (urlPattern.test(myVariable)) {
                    //alert("valid url");
                    $("#editdynbnrtagurl").text("");
                } else {
                    // swal({
                    // 	title: "Success",
                    // 	text: "Tag url is not correct format",
                    // 	timer: 2500
                    // });
                    $("#editdynbnrtagurl").text("Tag url is not correct format");
                    return false;
                }
            }
            $(btn).attr('disabled', 'disabled');
            var form = $('#dynamic_banner_form_id_edit')[0];
            var data = new FormData(form);
            $.ajax({
                type: "POST",
                url: "{{ url('update/bannerdata') }}",
                data: data,
                datatype: "json",
                processData: false,
                contentType: false,
                cache: false,
                success: function(response) {
                    console.log(response.data);
                    $('#myModal_dynamicbanner_edit').modal('hide')
                    //alert(response.message);
                    swal({
                        title: "Success",
                        text: response.message,
                        timer: 2500
                    });
                    $("#tr_" + response.data.id).find('.cl_bnr_property').text(response.data
                        .banner_priority);
                    $("#tr_" + response.data.id).find('.cl_bnr_lnk').text(response.data
                    .banner_link);
                    $("#tr_" + response.data.id).find('.cl_bnr_tag_txt').text(response.data
                        .banner_tag_text);
                    $("#tr_" + response.data.id).find('.cl_bnr_tag_lnk_url').text(response.data
                        .banner_tag_linking_url);
                    $("#tr_" + response.data.id).find('.cl_bnr_img').attr("src", response.data
                        .banner_image);
                    $(btn).removeAttr('disabled');
                },
                error: function(error) {
                    alert('not updatedata');
                }
            });
        } else {
            if ($('#edit_dynamic_tag_text_id').val().trim() == "") {
                //alert("Tag text is required");
                // swal({
                // 	title: "Success",
                // 	text: "Tag text is required",
                // 	timer: 2500
                // });
                $("#editdynbnrtagtxt").text("Tag text is required");
                return false;
            }
            if ($('#edit_dynamic_tag_url_id').val().trim() == "") {
                //alert("Tag url is required");
                // swal({
                // 	title: "Success",
                // 	text: "Tag url is required",
                // 	timer: 2500
                // });
                $("#editdynbnrtagurl").text("Tag url is required");
                return false;
            } else {
                //alert('Ok');
                var myVariable2 = $('#edit_dynamic_tag_url_id').val().trim();
                if (/^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/|www\.)[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/
                    .test(myVariable2)) {
                    $("#editdynbnrtagurl").text("");
                } else {
                    // swal({
                    // 	title: "Success",
                    // 	text: "Tag url is not correct format",
                    // 	timer: 2500
                    // });
                    $("#editdynbnrtagurl").text("URL for tag  is not in the  correct format");
                    return false;
                }
            }
        }
        // }
        // else{
        // 	//alert("Banner image is required");
        // 	swal({
        // 		title: "Success",
        // 		text: "Banner image is required",
        // 		timer: 2500
        // 	}); 
        // }
    });

    function fnDelete(id) {
        //if(confirm("Are you sure?")==true){
        var data = id;
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this Banner",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "POST",
                    url: "{{ url('delete/dynamicbanner') }}/" + id,
                    data: {
                        'data': data,
                        _token: "{{ csrf_token() }}"
                    },
                    dataType: "json",
                    success: function(response) {
                        //console.log(response)
                        //alert(id);
                        //alert("delete successfully");
                        swal({
                            title: "Success",
                            text: "Banner deleted successfully",
                            timer: 2500
                        });
                        Dttblbind();
                        $("#tr_" + id).remove();
                        //location.reload();
                    },
                    error: function(error) {
                        //console.log.reload(error)
                        alert("data not delete");
                    }
                });
            }
        });
        // }
        // else{
        // 	return false;
        // }
    }

    $('input[type="url"], input[type="text"]').on('keydown', function(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            return false;
        }
    });

    $(document).on('click', '.remove-table-btn', function(event) {
        event.preventDefault();
        // alert($(this).data('id'));
        var xx = $(this);
        $(this).data('id', $(this).closest(".panel-body_remove").find("#dynamic_bill_banner").data('id'));
        $(this).closest(".panel-body_remove").find("#dynamic_bill_banner").data('id', 0);
        // alert($(this).closest(".panel-body_remove").find("#dynamic_bill_banner").data('id'));
        swal({
            title: "Are you sure?",
            text: "Want to remove this tile?",
            cancel: false,
            confirm: true,
            dangerMode: true,
        }).then((isConfirm) => {
            // alert('Ok');
            if (isConfirm) {
                // alert('Ok');
                $.ajax({
                    type: "POST",
                    url: "{{ url('remove/tile') }}",
                    data: {
                        'id': $(xx).data("id"),
                        _token: "{{ csrf_token() }}"
                    },
                    dataType: "json",
                    success: function(response) {
                        //alert(response.message);
                        swal({
                            title: "Success",
                            text: response.message,
                            timer: 2500
                        });
                        banner_count = $('.clbnrimg').length;
                        if (banner_count < 3) {
                            $(".add-anothet-var").removeClass("addnewitem-disabled");
                        }
                    },
                    error: function(error) {
                        console.log(error);
                        alert('data not saved');
                    }
                });
                // $(this).closest(".panel-ebill").remove();panel-body
                $(this).closest(".panel-body_remove").remove();
            }
        });
    });

    $(document).on('click', '#country-listbox', function() {
        $('#txtCountryCode').val(parseInt($('.iti__selected-dial-code').text()));
        fnmobno();
    });

    function validateInput(input) {
        var value = input.value.trim();
        input.value = value.replace(/\s/g, '');
        var errorSpan = document.getElementById(input.id + '_error');
        if (value !== input.value) {
            errorSpan.innerText = 'Spaces are not allowed.';
        } else {
            errorSpan.innerText = '';
        }
    }

    function validateInputEmail(input) {
        var value = input.value.trim();
        input.value = value.replace(/\s/g, '');
        var errorSpan = document.getElementById(input.id + '_error');
        var emailPattern = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/;

        if (value !== input.value) {
            errorSpan.innerText = 'Spaces are not allowed.';
        } else if (!emailPattern.test(value)) {
            errorSpan.innerText = 'Invalid email address.';
        } else {
            errorSpan.innerText = '';
        }
    }



    $('#company_number').on('input', function(e) {
        numlength(e);
    });
    $("#company_number2").on('input', function() {
        console.log("input");
        if ($('#company_number2').val() != "") {
            if ($('#company_number2').val().length != 10) {
                $('#company_numbererror2').text("Number must be 10 digit.");
                $('#company_number2').focus();
                return false;
            } else {
                $('#company_numbererror2').text("");
            }

        }
    });
    $("#company_number3").on('input', function() {
        if ($('#company_number3').val() != "") {
            if ($('#company_number3').val().length != 10) {
                $('#company_numbererror3').text("Number must be 10 digit.");
                $('#company_number3').focus();
                return false;
            } else {
                $('#company_numbererror3').text("");
            }
        }
    });

    // $('#company_country_code').on('change',function(){
    // 	numlength();
    // });

    function numlength(e) {
        e.preventDefault();
        var countryCode = $('#company_country_code').val();
        // alert(countryCode);
        if (countryCode === "91") {
            $('#company_number').prop('maxlength', '10');
            if ($('#company_number').val() != "") {
                if ($('#company_number').val().length != 10) {
                    $('#company_numbererror').text("Number must be 10 digit.");
                    //$('#company_number').val("");
                    return false;
                } else {
                    $('#company_numbererror').text("");
                }
            }
        } else {
            $('#company_number').prop('maxlength', '18');
            $('#company_numbererror').text("");
        }
    }

    $('.my-colorpicker3').colorpicker();
</script>
@stop
