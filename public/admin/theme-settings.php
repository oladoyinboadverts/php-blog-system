 <!-- theme settings-->
            <div class="settings-wrapper builder d-none d-md-block" id="builder">
                <div class="p-l-20 p-r-20">
                    <a id="builder-close" class="builder-close settings-toggle" href="javascript:void(0)" title="Close">
                        <i class="fa fa-close" aria-hidden="true"></i>
                    </a>
                    <a id="builder-toggle" class="builder-toggle" title="Settings">
                        <i class="fa fa-cog fa-spin" aria-hidden="true"></i>
                    </a>
                    <ul class="nav nav-tabs nav-tabs-simple nav-tabs-simple-bottom nav-justified" id="settingsTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="layouts-tab" data-toggle="tab" href="#layouts" role="tab" aria-controls="layouts" aria-expanded="true">Layout settings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="colors-tab" data-toggle="tab" href="#colors" role="tab" aria-controls="colors" aria-expanded="false">Custom Colors</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="settingsTabContent">
                        <div role="tabpanel" class="tab-pane fade active show" id="layouts" aria-labelledby="layouts-tab" aria-expanded="true">
                            <div class="scroll-wrapper">
                                <div class="scroll-content">
                                    <div>
                                        <h5 class="semi-bold">
                                            Layout color options
                                        </h5>
                                        <div class="sidebar-settings m-b-10">
                                            <p class="hint-text mb-0">
                                                Sidebar color.
                                            </p>
                                            <button type="button" class="btn btn-outline-primary btn-activate-sidebar mt-2 active" title="Light Sidebar" id="activate-light-sidebar">
                                                Light
                                            </button>
                                            <button type="button" class="btn btn-outline-primary btn-activate-sidebar mt-2" title="Dark Sidebar" id="activate-dark-sidebar">
                                                Dark
                                            </button>
                                        </div>
                                        <div class="header-settings m-b-10">
                                            <p class="hint-text mb-0">
                                                Header color.
                                            </p>
                                            <button type="button" class="btn btn-outline-info btn-activate-header mt-2" title="Light Header" id="activate-light-header">
                                                Light
                                            </button>
                                            <button type="button" class="btn btn-outline-info btn-activate-header mt-2 active" title="Dark Header" id="activate-dark-header">
                                                Dark
                                            </button>
                                        </div>
            
                                        <div class="m-b-10">
                                            <p class="hint-text mb-0">
                                                Main color of your theme
                                            </p>
                                            <button type="button" class="btn btn-outline-green btn-activate-color btn-raised mt-2 btn-circle active" id="activate-green" title="Green">
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                            </button>
                                            <button type="button" class="btn btn-outline-purple btn-activate-color btn-raised mt-2 btn-circle" id="activate-purple" title="Purple">
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                            </button>
                                            <button type="button" class="btn btn-outline-red btn-activate-color btn-raised mt-2 btn-circle" id="activate-red" title="Red">
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                            </button>
                                            <button type="button" class="btn btn-outline-cyan btn-activate-color btn-raised mt-2 btn-circle" id="activate-cyan" title="Cyan">
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                            </button>
                                            <button type="button" class="btn btn-outline-orange btn-activate-color btn-raised mt-2 btn-circle" id="activate-orange" title="Orange">
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                            </button>
                                            <button type="button" class="btn btn-outline-grey btn-activate-color btn-raised mt-2 btn-circle" id="activate-grey" title="Grey">
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                            </button>
                                            <p class="hint-text mt-2">Pick a Custom Theme Color</p>
                                            <input class="jscolor form-control btn-activate-color d-inline-block" id="activate-custom" value="4DD0E1" title="Pick a custom theme color">
                                        </div>
                                        <h5 class="semi-bold">
                                            Sidebar background options
                                        </h5>
                                        <div class="row">
                                            <div class="col-md-12 col-lg-12">
                                                <div class="card box-shadow-none">
                                                    <div class="card-body sidebar-bg-image-settings p-0">
                                                        <div class="layout-view sidebar-bg-image-setting
                                                        sidebar-bg-image-setting-1 d-flex align-items-center justify-content-center"
                                                             title="Urban area"
                                                             data-className="sidebar-urban-area-image">
                                                            <button type="button" class="card-link btn btn-theme btn-activate mt-2 activate-sidebar-bg-image"></button>
                                                        </div>
                                                        <div class="layout-view sidebar-bg-image-setting sidebar-bg-image-setting-2 d-flex align-items-center justify-content-center"
                                                             title="Office building"
                                                             data-className="sidebar-office-building-image">
                                                            <button type="button" class="card-link btn btn-theme btn-activate mt-2 activate-sidebar-bg-image"></button>
                                                        </div>
                                                        <div class="layout-view sidebar-bg-image-setting sidebar-bg-image-setting-3 d-flex align-items-center justify-content-center"
                                                             title="Mountain"
                                                             data-className="sidebar-mountain-image">
                                                            <button type="button" class="card-link btn btn-theme btn-activate mt-2 activate-sidebar-bg-image"></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h5 class="semi-bold">
                                            Sidebar graphic background options
                                        </h5>
                                        <div class="row">
                                            <div class="col-md-12 col-lg-12">
                                                <div class="card box-shadow-none">
                                                    <div class="card-body sidebar-bg-image-settings  sidebar-bg-graphic-image-settings p-0">
                                                        <div class="layout-view sidebar-bg-image-setting sidebar-bg-graphic-image-setting-1 d-flex align-items-center justify-content-center"
                                                             title="Fixed graphic background image"
                                                             data-className="sidebar-triangle-right-bottom">
                                                            <button type="button" class="card-link btn btn-theme btn-activate mt-2 activate-sidebar-bg-image"></button>
                                                        </div>
                                                        <div class="layout-view sidebar-bg-image-setting sidebar-bg-graphic-image-setting-2 d-flex align-items-center justify-content-center"
                                                             title="Fixed graphic background image"
                                                             data-className="sidebar-triangle-top-bottom">
                                                            <button type="button" class="card-link btn btn-theme btn-activate mt-2 activate-sidebar-bg-image"></button>
                                                        </div>
                                                        <div class="layout-view sidebar-bg-image-setting sidebar-bg-graphic-image-setting-3 d-flex align-items-center justify-content-center"
                                                             title="Fixed graphic background image"
                                                             data-className="sidebar-triangle-left-right-bottom">
                                                            <button type="button" class="card-link btn btn-theme btn-activate mt-2 activate-sidebar-bg-image"></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h5 class="semi-bold">
                                            Layout view options
                                        </h5>
                                        <div class="row">
                                            <div class="col-md-12 col-lg-12">
                                                <div class="card box-shadow-none">
                                                    <div class="card-body p-0">
                                                        <h5 class="card-title hint-text">Fixed full width header</h5>
                                                        <div class="layout-view layout-view-fixed-header d-flex align-items-center justify-content-center"
                                                             id="activate-fixed-header"
                                                             title="Activate Fixed Full Width Header">
                                                            <button type="button" class="card-link btn btn-theme btn-activate mt-2"></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
            
                                            <div class="col-md-12 col-lg-12">
                                                <div class="card box-shadow-none">
                                                    <div class="card-body p-0">
                                                        <h5 class="card-title hint-text">Left sidebar</h5>
                                                        <div class="layout-view active layout-view-left-sidebar d-flex align-items-center justify-content-center"
                                                             id="activate-left-sidebar"
                                                             title="Activate Left Sidebar">
                                                            <button type="button" class="card-link btn btn-theme btn-activate mt-2"></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
            
                                            <div class="col-md-12 col-lg-12">
                                                <div class="card box-shadow-none">
                                                    <div class="card-body p-0">
                                                        <h5 class="card-title hint-text">Right sidebar</h5>
                                                        <div class="layout-view layout-view-right-sidebar d-flex align-items-center justify-content-center"
                                                             id="activate-right-sidebar"
                                                             title="Activate Right Sidebar">
                                                            <button type="button" class="card-link btn btn-theme btn-activate mt-2"></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-lg-12">
                                                <div class="card box-shadow-none mb-0">
                                                    <div class="card-body p-0">
                                                        <h5 class="card-title hint-text">RTL Content</h5>
                                                        <div class="layout-view layout-view-rtl-content d-flex align-items-center justify-content-center"
                                                             id="activate-rtl-content"
                                                             title="Activate RTL Content">
                                                            <button type="button" class="card-link btn btn-theme btn-activate activate-rtl mt-2"></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="colors" role="tabpanel" aria-labelledby="colors-tab" aria-expanded="false">
                            <div class="scroll-wrapper">
                                <div class="scroll-content">
                                    <div>
                                        <h5 class="semi-bold">
                                            Color Options
                                        </h5>
                                        <p class="hint-text">
                                            Customize colors of your theme.
                                        </p>
                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="d-flex justify-content-between align-items-center color-settings-row">
                                                    <div>
                                                        <label>Pick a primary background color</label>
                                                        <input class="jscolor {position:'left'} form-control" id="primary-color" value="6d5cae" title="Pick a primary background color">
                                                        <label>Pick a primary text color</label>
                                                        <input class="jscolor {position:'left'} form-control" id="primary-text-color" value="ffffff" title="Pick a primary text color">
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                      <button class="btn mt-1 btn-prev" id="btn-primary-prev" title="Preview of primary color">Primary</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="d-flex justify-content-between align-items-center color-settings-row">
                                                    <div>
                                                        <label>Pick a secondary background color</label>
                                                        <input class="jscolor {position:'left'} form-control" id="secondary-color" value="cfd0d2" title="Pick a secondary background color">
                                                        <label>Pick a secondary text color</label>
                                                        <input class="jscolor {position:'left'} form-control" id="secondary-text-color" value="ffffff" title="Pick a secondary text color">
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <button class="btn mt-1 btn-prev" id="btn-secondary-prev" title="Preview of secondary color">Secondary</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="d-flex justify-content-between align-items-center color-settings-row">
                                                    <div>
                                                        <label>Pick a success background color</label>
                                                        <input class="jscolor {position:'left'} form-control" id="success-color" value="0aa89e" title="Pick a success background color">
                                                        <label>Pick a success text color</label>
                                                        <input class="jscolor {position:'left'} form-control" id="success-text-color" value="ffffff" title="Pick a success text color">
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <button class="btn mt-1 btn-prev" id="btn-success-prev" title="Preview of success color">Success</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
            
            
                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="d-flex justify-content-between align-items-center color-settings-row">
                                                    <div>
                                                        <label>Pick a info background color</label>
                                                        <input class="jscolor {position:'left'} form-control" id="info-color" value="4DD0E1" title="Pick a info background color">
                                                        <label>Pick a info text color</label>
                                                        <input class="jscolor {position:'left'} form-control" id="info-text-color" value="ffffff" title="Pick a info text color">
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <button class="btn mt-1 btn-prev" id="btn-info-prev" title="Preview of info color">Info</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
            
                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="d-flex justify-content-between align-items-center color-settings-row">
                                                    <div>
                                                        <label>Pick a warning background color</label>
                                                        <input class="jscolor {position:'left'} form-control" id="warning-color" value="ffaa00" title="Pick a warning background color">
                                                        <label>Pick a warning text color</label>
                                                        <input class="jscolor {position:'left'} form-control" id="warning-text-color" value="ffffff" title="Pick a warning text color">
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <button class="btn mt-1 btn-prev" id="btn-warning-prev" title="Preview of warning color">Warning</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
            
                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="d-flex justify-content-between align-items-center color-settings-row">
                                                    <div>
                                                        <label>Pick a danger background color</label>
                                                        <input class="jscolor {position:'left'} form-control" id="danger-color" value="e43a45" title="Pick a danger background color">
                                                        <label>Pick a danger text color</label>
                                                        <input class="jscolor {position:'left'} form-control" id="danger-text-color" value="ffffff" title="Pick a danger text color">
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <button class="btn mt-1 btn-prev" id="btn-danger-prev" title="Preview of danger color">Danger</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
            
                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="d-flex justify-content-between align-items-center color-settings-row">
                                                    <div>
                                                        <label>Pick a light background color</label>
                                                        <input class="jscolor {position:'left'} form-control" id="light-color" value="eaeef3" title="Pick a light background color">
                                                        <label>Pick a light text color</label>
                                                        <input class="jscolor {position:'left'} form-control" id="light-text-color" value="8e959d" title="Pick a light text color">
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <button class="btn mt-1 btn-prev" id="btn-light-prev" title="Preview of light color">Light</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
            
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="d-flex justify-content-between align-items-center color-settings-row">
                                                    <div>
                                                        <label>Pick a dark background color</label>
                                                        <input class="jscolor {position:'left'} form-control" id="dark-color" value="8e959d" title="Pick a dark background color">
                                                        <label>Pick a dark text color</label>
                                                        <input class="jscolor {position:'left'} form-control" id="dark-text-color" value="ffffff" title="Pick a dark text color">
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <button class="btn mt-1 btn-prev" id="btn-dark-prev" title="Preview of dark color">Dark</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="fixed-bottom-buttons">
                        <div class="mt-2">
                            <button type="button" id="btnOpenSaveSettingsModal" class="btn btn-theme btn-raised" data-toggle="modal" data-target="#save-settings-modal" title="Save Settings">
                                <i class="fa fa-check left" aria-hidden="true"></i><span>Save</span>
                            </button>
                            <button type="button" class="btn btn-theme btn-raised" id="btnPrevSettings" title="Preview Settings">
                                <i class="fa fa-clone left" aria-hidden="true"></i><span>Preview</span>
                            </button>
                            <button type="button" class="btn btn-light btn-raised" id="btnCancelSettings" title="Cancel Settings">
                                <i class="fa fa-ban left" aria-hidden="true"></i><span>Cancel</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Settings Modal -->
            <div class="modal fade" id="save-settings-modal" tabindex="-1" role="dialog" aria-labelledby="SaveModal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="SaveModal">Save Settings</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <p>If you want to get this view in the project, you should change <code>body</code> classlist to this</p>
                                <p id="customized-body-classlist" class="font-weight-bold"></p>
                            </div>
                           <div>
                               <p>If you want to use these colors in the template, you should find and replace the code of this file <span class="text-success">src/sass/partials/default-colors.sass</span> to this code</p>
                               <p id="customized-css" class="font-weight-bold"></p>
                           </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-theme" id="btnSaveSettings">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /theme settings -->
			
			<div class="main-content small-gutter" role="main">