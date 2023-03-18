<?php 
session_name('mercado');
session_start();

if ($_SESSION == array()) {
    $msg = urlencode("Sess�o Encerrada");

header("Location: index.php?mensagem=$msg");
  
}

include "includes/cabecalho.php"; ?>
<main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Primary Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Warning Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Success Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Danger Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Area Chart Example
                                    </div>
                                    <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div><canvas id="myAreaChart" width="750" height="300" style="display: block; width: 750px; height: 300px;" class="chartjs-render-monitor"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Bar Chart Example
                                    </div>
                                    <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div><canvas id="myBarChart" width="750" height="300" class="chartjs-render-monitor" style="display: block; width: 750px; height: 300px;"></canvas></div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                                <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns"><div class="datatable-top">
    <div class="datatable-dropdown">
            <label>
                <select class="datatable-selector"><option value="5">5</option><option value="10" selected="">10</option><option value="15">15</option><option value="20">20</option><option value="25">25</option></select> entries per page
            </label>
        </div>
    <div class="datatable-search">
            <input class="datatable-input" placeholder="Search..." type="search" title="Search within table" aria-controls="datatablesSimple">
        </div>
</div>
<div class="datatable-container"><table id="datatablesSimple" class="datatable-table"><thead><tr><th data-sortable="true" style="width: 20.03853564547206%;"><a href="#" class="datatable-sorter">Name</a></th><th data-sortable="true" style="width: 31.406551059730248%;"><a href="#" class="datatable-sorter">Position</a></th><th data-sortable="true" style="width: 15.478484264611433%;"><a href="#" class="datatable-sorter">Office</a></th><th data-sortable="true" style="width: 6.679511881824022%;"><a href="#" class="datatable-sorter">Age</a></th><th data-sortable="true" style="width: 13.55170199100835%;"><a href="#" class="datatable-sorter">Start date</a></th><th data-sortable="true" style="width: 12.845215157353888%;"><a href="#" class="datatable-sorter">Salary</a></th></tr></thead><tbody><tr data-index="0"><td>Tiger Nixon</td><td>System Architect</td><td>Edinburgh</td><td>61</td><td>2011/04/25</td><td>$320,800</td></tr><tr data-index="1"><td>Garrett Winters</td><td>Accountant</td><td>Tokyo</td><td>63</td><td>2011/07/25</td><td>$170,750</td></tr><tr data-index="2"><td>Ashton Cox</td><td>Junior Technical Author</td><td>San Francisco</td><td>66</td><td>2009/01/12</td><td>$86,000</td></tr><tr data-index="3"><td>Cedric Kelly</td><td>Senior Javascript Developer</td><td>Edinburgh</td><td>22</td><td>2012/03/29</td><td>$433,060</td></tr><tr data-index="4"><td>Airi Satou</td><td>Accountant</td><td>Tokyo</td><td>33</td><td>2008/11/28</td><td>$162,700</td></tr><tr data-index="5"><td>Brielle Williamson</td><td>Integration Specialist</td><td>New York</td><td>61</td><td>2012/12/02</td><td>$372,000</td></tr><tr data-index="6"><td>Herrod Chandler</td><td>Sales Assistant</td><td>San Francisco</td><td>59</td><td>2012/08/06</td><td>$137,500</td></tr><tr data-index="7"><td>Rhona Davidson</td><td>Integration Specialist</td><td>Tokyo</td><td>55</td><td>2010/10/14</td><td>$327,900</td></tr><tr data-index="8"><td>Colleen Hurst</td><td>Javascript Developer</td><td>San Francisco</td><td>39</td><td>2009/09/15</td><td>$205,500</td></tr><tr data-index="9"><td>Sonya Frost</td><td>Software Engineer</td><td>Edinburgh</td><td>23</td><td>2008/12/13</td><td>$103,600</td></tr></tbody></table></div>
<div class="datatable-bottom">
    <div class="datatable-info">Showing 1 to 10 of 57 entries</div>
    <nav class="datatable-pagination"><ul class="datatable-pagination-list"><li class="datatable-pagination-list-item datatable-hidden datatable-disabled"><a data-page="1" class="datatable-pagination-list-item-link">‹</a></li><li class="datatable-pagination-list-item datatable-active"><a data-page="1" class="datatable-pagination-list-item-link">1</a></li><li class="datatable-pagination-list-item"><a data-page="2" class="datatable-pagination-list-item-link">2</a></li><li class="datatable-pagination-list-item"><a data-page="3" class="datatable-pagination-list-item-link">3</a></li><li class="datatable-pagination-list-item"><a data-page="4" class="datatable-pagination-list-item-link">4</a></li><li class="datatable-pagination-list-item"><a data-page="5" class="datatable-pagination-list-item-link">5</a></li><li class="datatable-pagination-list-item"><a data-page="6" class="datatable-pagination-list-item-link">6</a></li><li class="datatable-pagination-list-item"><a data-page="2" class="datatable-pagination-list-item-link">›</a></li></ul></nav>
</div></div>
                            </div>
                        </div>
                    </div>
                </main>
</div>
</div>


</meta>