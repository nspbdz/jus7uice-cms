@extends('layout.backend')

@section('css')
<link href="{{asset('template/tabler/dist/css/demo.min.css')}}" rel="stylesheet"/>
@endsection

@section('page_pretitle')
Overview
@endsection

@section('page_title')
Fluid layout
@endsection

@section('page_nav_button')
<span class="d-none d-sm-inline">
<a href="#" class="btn btn-white">
	New view
</a>
</span>
<a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-report">
	<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
	Create new report
</a>
@endsection

@section('content')		  
          <div class="row row-deck row-cards">
            <div class="col-sm-6 col-lg-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div class="subheader">Sales</div>
                    <div class="ms-auto lh-1">
                      <div class="dropdown">
                        <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Last 7 days</a>
                        <div class="dropdown-menu dropdown-menu-end">
                          <a class="dropdown-item active" href="#">Last 7 days</a>
                          <a class="dropdown-item" href="#">Last 30 days</a>
                          <a class="dropdown-item" href="#">Last 3 months</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="h1 mb-3">75%</div>
                  <div class="d-flex mb-2">
                    <div>Conversion rate</div>
                    <div class="ms-auto">
                      <span class="text-green d-inline-flex align-items-center lh-1">
                        7% <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="3 17 9 11 13 15 21 7" /><polyline points="14 7 21 7 21 14" /></svg>
                      </span>
                    </div>
                  </div>
                  <div class="progress progress-sm">
                    <div class="progress-bar bg-blue" style="width: 75%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                      <span class="visually-hidden">75% Complete</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div class="subheader">Revenue</div>
                    <div class="ms-auto lh-1">
                      <div class="dropdown">
                        <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Last 7 days</a>
                        <div class="dropdown-menu dropdown-menu-end">
                          <a class="dropdown-item active" href="#">Last 7 days</a>
                          <a class="dropdown-item" href="#">Last 30 days</a>
                          <a class="dropdown-item" href="#">Last 3 months</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex align-items-baseline">
                    <div class="h1 mb-0 me-2">$4,300</div>
                    <div class="me-auto">
                      <span class="text-green d-inline-flex align-items-center lh-1">
                        8% <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="3 17 9 11 13 15 21 7" /><polyline points="14 7 21 7 21 14" /></svg>
                      </span>
                    </div>
                  </div>
                </div>
                <div id="chart-revenue-bg" class="chart-sm"></div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div class="subheader">New clients</div>
                    <div class="ms-auto lh-1">
                      <div class="dropdown">
                        <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Last 7 days</a>
                        <div class="dropdown-menu dropdown-menu-end">
                          <a class="dropdown-item active" href="#">Last 7 days</a>
                          <a class="dropdown-item" href="#">Last 30 days</a>
                          <a class="dropdown-item" href="#">Last 3 months</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex align-items-baseline">
                    <div class="h1 mb-3 me-2">6,782</div>
                    <div class="me-auto">
                      <span class="text-yellow d-inline-flex align-items-center lh-1">
                        0% <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="5" y1="12" x2="19" y2="12" /></svg>
                      </span>
                    </div>
                  </div>
                  <div id="chart-new-clients" class="chart-sm"></div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div class="subheader">Active users</div>
                    <div class="ms-auto lh-1">
                      <div class="dropdown">
                        <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Last 7 days</a>
                        <div class="dropdown-menu dropdown-menu-end">
                          <a class="dropdown-item active" href="#">Last 7 days</a>
                          <a class="dropdown-item" href="#">Last 30 days</a>
                          <a class="dropdown-item" href="#">Last 3 months</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex align-items-baseline">
                    <div class="h1 mb-3 me-2">2,986</div>
                    <div class="me-auto">
                      <span class="text-green d-inline-flex align-items-center lh-1">
                        4% <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="3 17 9 11 13 15 21 7" /><polyline points="14 7 21 7 21 14" /></svg>
                      </span>
                    </div>
                  </div>
                  <div id="chart-active-users" class="chart-sm"></div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="row row-cards">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h3 class="card-title">Traffic summary</h3>
                      <div id="chart-mentions" class="chart-lg"></div>
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <p class="mb-3">Using Storage <strong>6854.45 MB </strong>of 8 GB</p>
                      <div class="progress progress-separated mb-3">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 44%"></div>
                        <div class="progress-bar bg-info" role="progressbar" style="width: 19%"></div>
                        <div class="progress-bar bg-success" role="progressbar" style="width: 9%"></div>
                      </div>
                      <div class="row">
                        <div class="col-auto d-flex align-items-center pe-2">
                          <span class="legend me-2 bg-primary"></span>
                          <span>Regular</span>
                          <span class="d-none d-md-inline d-lg-none d-xxl-inline ms-2 text-muted">915MB</span>
                        </div>
                        <div class="col-auto d-flex align-items-center px-2">
                          <span class="legend me-2 bg-info"></span>
                          <span>System</span>
                          <span class="d-none d-md-inline d-lg-none d-xxl-inline ms-2 text-muted">415MB</span>
                        </div>
                        <div class="col-auto d-flex align-items-center px-2">
                          <span class="legend me-2 bg-success"></span>
                          <span>Shared</span>
                          <span class="d-none d-md-inline d-lg-none d-xxl-inline ms-2 text-muted">201MB</span>
                        </div>
                        <div class="col-auto d-flex align-items-center ps-2">
                          <span class="legend me-2"></span>
                          <span>Free</span>
                          <span class="d-none d-md-inline d-lg-none d-xxl-inline ms-2 text-muted">612MB</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="card">
                    <div class="card-body p-2 text-center">
                      <div class="text-end text-green">
                        <span class="text-green d-inline-flex align-items-center lh-1">
                          6% <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="3 17 9 11 13 15 21 7" /><polyline points="14 7 21 7 21 14" /></svg>
                        </span>
                      </div>
                      <div class="h1 m-0">43</div>
                      <div class="text-muted mb-3">New Tickets</div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="card">
                    <div class="card-body p-2 text-center">
                      <div class="text-end text-red">
                        <span class="text-red d-inline-flex align-items-center lh-1">
                          -2% <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="3 7 9 13 13 9 21 17" /><polyline points="21 10 21 17 14 17" /></svg>
                        </span>
                      </div>
                      <div class="h1 m-0">95</div>
                      <div class="text-muted mb-3">Daily Earnings</div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="card">
                    <div class="card-body p-2 text-center">
                      <div class="text-end text-green">
                        <span class="text-green d-inline-flex align-items-center lh-1">
                          9% <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="3 17 9 11 13 15 21 7" /><polyline points="14 7 21 7 21 14" /></svg>
                        </span>
                      </div>
                      <div class="h1 m-0">7</div>
                      <div class="text-muted mb-3">New Replies</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header border-0">
                  <div class="card-title">Development activity</div>
                </div>
                <div class="position-relative">
                  <div class="position-absolute top-0 left-0 px-3 mt-1 w-50">
                    <div class="row g-2">
                      <div class="col-auto">
                        <div class="chart-sparkline chart-sparkline-square" id="sparkline-activity"></div>
                      </div>
                      <div class="col">
                        <div>Today's Earning: $4,262.40</div>
                        <div class="text-muted"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline text-green" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="3 17 9 11 13 15 21 7" /><polyline points="14 7 21 7 21 14" /></svg>
                          +5% more than yesterday</div>
                      </div>
                    </div>
                  </div>
                  <div id="chart-development-activity"></div>
                </div>
                <div class="card-table table-responsive">
                  <table class="table table-vcenter">
                    <thead>
                      <tr>
                        <th>User</th>
                        <th>Commit</th>
                        <th>Date</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="w-1">
                          <span class="avatar avatar-sm" style="background-image: url(./static/avatars/000m.jpg)"></span>
                        </td>
                        <td class="td-truncate">
                          <div class="text-truncate">
                            Fix dart Sass compatibility (#29755)
                          </div>
                        </td>
                        <td class="text-nowrap text-muted">28 Nov 2019</td>
                      </tr>
                      <tr>
                        <td class="w-1">
                          <span class="avatar avatar-sm">JL</span>
                        </td>
                        <td class="td-truncate">
                          <div class="text-truncate">
                            Change deprecated html tags to text decoration classes (#29604)
                          </div>
                        </td>
                        <td class="text-nowrap text-muted">27 Nov 2019</td>
                      </tr>
                      <tr>
                        <td class="w-1">
                          <span class="avatar avatar-sm" style="background-image: url(./static/avatars/002m.jpg)"></span>
                        </td>
                        <td class="td-truncate">
                          <div class="text-truncate">
                            justify-content:between ⇒ justify-content:space-between (#29734)
                          </div>
                        </td>
                        <td class="text-nowrap text-muted">26 Nov 2019</td>
                      </tr>
                      <tr>
                        <td class="w-1">
                          <span class="avatar avatar-sm" style="background-image: url(./static/avatars/003m.jpg)"></span>
                        </td>
                        <td class="td-truncate">
                          <div class="text-truncate">
                            Update change-version.js (#29736)
                          </div>
                        </td>
                        <td class="text-nowrap text-muted">26 Nov 2019</td>
                      </tr>
                      <tr>
                        <td class="w-1">
                          <span class="avatar avatar-sm" style="background-image: url(./static/avatars/000f.jpg)"></span>
                        </td>
                        <td class="td-truncate">
                          <div class="text-truncate">
                            Regenerate package-lock.json (#29730)
                          </div>
                        </td>
                        <td class="text-nowrap text-muted">25 Nov 2019</td>
                      </tr>
                      <tr>
                        <td class="w-1">
                          <span class="avatar avatar-sm" style="background-image: url(./static/avatars/001f.jpg)"></span>
                        </td>
                        <td class="td-truncate">
                          <div class="text-truncate">
                            Some minor text tweaks
                          </div>
                        </td>
                        <td class="text-nowrap text-muted">24 Nov 2019</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card" style="height: calc(24rem + 10px)">
                <div class="card-body card-body-scrollable card-body-scrollable-shadow">
                  <div class="divide-y-4">
                    <div>
                      <div class="row">
                        <div class="col-auto">
                          <span class="avatar">JL</span>
                        </div>
                        <div class="col">
                          <div class="text-truncate">
                            <strong>Jeffie Lewzey</strong> commented on your <strong>"I'm not a witch."</strong> post.
                          </div>
                          <div class="text-muted">yesterday</div>
                        </div>
                        <div class="col-auto align-self-center">
                          <div class="badge bg-primary"></div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="row">
                        <div class="col-auto">
                          <span class="avatar" style="background-image: url(./static/avatars/002m.jpg)"></span>
                        </div>
                        <div class="col">
                          <div class="text-truncate">
                            It's <strong>Mallory Hulme</strong>'s birthday. Wish him well!
                          </div>
                          <div class="text-muted">2 days ago</div>
                        </div>
                        <div class="col-auto align-self-center">
                          <div class="badge bg-primary"></div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="row">
                        <div class="col-auto">
                          <span class="avatar" style="background-image: url(./static/avatars/003m.jpg)"></span>
                        </div>
                        <div class="col">
                          <div class="text-truncate">
                            <strong>Dunn Slane</strong> posted <strong>"Well, what do you want?"</strong>.
                          </div>
                          <div class="text-muted">today</div>
                        </div>
                        <div class="col-auto align-self-center">
                          <div class="badge bg-primary"></div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="row">
                        <div class="col-auto">
                          <span class="avatar" style="background-image: url(./static/avatars/000f.jpg)"></span>
                        </div>
                        <div class="col">
                          <div class="text-truncate">
                            <strong>Emmy Levet</strong> created a new project <strong>Morning alarm clock</strong>.
                          </div>
                          <div class="text-muted">4 days ago</div>
                        </div>
                        <div class="col-auto align-self-center">
                          <div class="badge bg-primary"></div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="row">
                        <div class="col-auto">
                          <span class="avatar" style="background-image: url(./static/avatars/001f.jpg)"></span>
                        </div>
                        <div class="col">
                          <div class="text-truncate">
                            <strong>Maryjo Lebarree</strong> liked your photo.
                          </div>
                          <div class="text-muted">2 days ago</div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="row">
                        <div class="col-auto">
                          <span class="avatar">EP</span>
                        </div>
                        <div class="col">
                          <div class="text-truncate">
                            <strong>Egan Poetz</strong> registered new client as <strong>Trilia</strong>.
                          </div>
                          <div class="text-muted">yesterday</div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="row">
                        <div class="col-auto">
                          <span class="avatar" style="background-image: url(./static/avatars/002f.jpg)"></span>
                        </div>
                        <div class="col">
                          <div class="text-truncate">
                            <strong>Kellie Skingley</strong> closed a new deal on project <strong>Pen Pineapple Apple Pen</strong>.
                          </div>
                          <div class="text-muted">2 days ago</div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="row">
                        <div class="col-auto">
                          <span class="avatar" style="background-image: url(./static/avatars/003f.jpg)"></span>
                        </div>
                        <div class="col">
                          <div class="text-truncate">
                            <strong>Christabel Charlwood</strong> created a new project for <strong>Wikibox</strong>.
                          </div>
                          <div class="text-muted">4 days ago</div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="row">
                        <div class="col-auto">
                          <span class="avatar">HS</span>
                        </div>
                        <div class="col">
                          <div class="text-truncate">
                            <strong>Haskel Shelper</strong> change status of <strong>Tabler Icons</strong> from <strong>open</strong> to <strong>closed</strong>.
                          </div>
                          <div class="text-muted">today</div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="row">
                        <div class="col-auto">
                          <span class="avatar" style="background-image: url(./static/avatars/006m.jpg)"></span>
                        </div>
                        <div class="col">
                          <div class="text-truncate">
                            <strong>Lorry Mion</strong> liked <strong>Tabler UI Kit</strong>.
                          </div>
                          <div class="text-muted">yesterday</div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="row">
                        <div class="col-auto">
                          <span class="avatar" style="background-image: url(./static/avatars/004f.jpg)"></span>
                        </div>
                        <div class="col">
                          <div class="text-truncate">
                            <strong>Leesa Beaty</strong> posted new video.
                          </div>
                          <div class="text-muted">2 days ago</div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="row">
                        <div class="col-auto">
                          <span class="avatar" style="background-image: url(./static/avatars/007m.jpg)"></span>
                        </div>
                        <div class="col">
                          <div class="text-truncate">
                            <strong>Perren Keemar</strong> and 3 others followed you.
                          </div>
                          <div class="text-muted">2 days ago</div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="row">
                        <div class="col-auto">
                          <span class="avatar">SA</span>
                        </div>
                        <div class="col">
                          <div class="text-truncate">
                            <strong>Sunny Airey</strong> upload 3 new photos to category <strong>Inspirations</strong>.
                          </div>
                          <div class="text-muted">2 days ago</div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="row">
                        <div class="col-auto">
                          <span class="avatar" style="background-image: url(./static/avatars/009m.jpg)"></span>
                        </div>
                        <div class="col">
                          <div class="text-truncate">
                            <strong>Geoffry Flaunders</strong> made a <strong>$10</strong> donation.
                          </div>
                          <div class="text-muted">2 days ago</div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="row">
                        <div class="col-auto">
                          <span class="avatar" style="background-image: url(./static/avatars/010m.jpg)"></span>
                        </div>
                        <div class="col">
                          <div class="text-truncate">
                            <strong>Thatcher Keel</strong> created a profile.
                          </div>
                          <div class="text-muted">3 days ago</div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="row">
                        <div class="col-auto">
                          <span class="avatar" style="background-image: url(./static/avatars/005f.jpg)"></span>
                        </div>
                        <div class="col">
                          <div class="text-truncate">
                            <strong>Dyann Escala</strong> hosted the event <strong>Tabler UI Birthday</strong>.
                          </div>
                          <div class="text-muted">4 days ago</div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="row">
                        <div class="col-auto">
                          <span class="avatar" style="background-image: url(./static/avatars/006f.jpg)"></span>
                        </div>
                        <div class="col">
                          <div class="text-truncate">
                            <strong>Avivah Mugleston</strong> mentioned you on <strong>Best of 2020</strong>.
                          </div>
                          <div class="text-muted">2 days ago</div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="row">
                        <div class="col-auto">
                          <span class="avatar">AA</span>
                        </div>
                        <div class="col">
                          <div class="text-truncate">
                            <strong>Arlie Armstead</strong> sent a Review Request to <strong>Amanda Blake</strong>.
                          </div>
                          <div class="text-muted">2 days ago</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="row row-cards">
                <div class="col-12">
                  <div class="card card-sm">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col-auto">
                          <span class="bg-blue text-white avatar"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" /><path d="M12 3v3m0 12v3" /></svg>
                          </span>
                        </div>
                        <div class="col">
                          <div class="font-weight-medium">
                            132 Sales
                          </div>
                          <div class="text-muted">
                            12 waiting payments
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="card card-sm">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col-auto">
                          <span class="bg-green text-white avatar"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="6" cy="19" r="2" /><circle cx="17" cy="19" r="2" /><path d="M17 17h-11v-14h-2" /><path d="M6 5l14 1l-1 7h-13" /></svg>
                          </span>
                        </div>
                        <div class="col">
                          <div class="font-weight-medium">
                            78 Orders
                          </div>
                          <div class="text-muted">
                            32 shipped
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="card card-sm">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col-auto">
                          <span class="bg-yellow text-white avatar"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="9" cy="7" r="4" /><path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /><path d="M16 3.13a4 4 0 0 1 0 7.75" /><path d="M21 21v-2a4 4 0 0 0 -3 -3.85" /></svg>
                          </span>
                        </div>
                        <div class="col">
                          <div class="font-weight-medium">
                            1352 Members
                          </div>
                          <div class="text-muted">
                            163 registered today
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="card card-sm">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col-auto">
                          <span class="bg-twitter text-white avatar"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c-.002 -.249 1.51 -2.772 1.818 -4.013z" /></svg>
                          </span>
                        </div>
                        <div class="col">
                          <div class="font-weight-medium">
                            623 Shares
                          </div>
                          <div class="text-muted">
                            16 today
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="card card-sm">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col-auto">
                          <span class="bg-facebook text-white avatar"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" /></svg>
                          </span>
                        </div>
                        <div class="col">
                          <div class="font-weight-medium">
                            132 Likes
                          </div>
                          <div class="text-muted">
                            21 today
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12 col-lg-8">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Most Visited Pages</h3>
                </div>
                <div class="card-table table-responsive">
                  <table class="table table-vcenter">
                    <thead>
                      <tr>
                        <th>Page name</th>
                        <th>Visitors</th>
                        <th>Unique</th>
                        <th colspan="2">Bounce rate</th>
                      </tr>
                    </thead>
                    <tr>
                      <td>
                        /about.html
                        <a href="#" class="ms-1" aria-label="Open website"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 14a3.5 3.5 0 0 0 5 0l4 -4a3.5 3.5 0 0 0 -5 -5l-.5 .5" /><path d="M14 10a3.5 3.5 0 0 0 -5 0l-4 4a3.5 3.5 0 0 0 5 5l.5 -.5" /></svg>
                        </a>
                      </td>
                      <td class="text-muted">4,896</td>
                      <td class="text-muted">3,654</td>
                      <td class="text-muted">82.54%</td>
                      <td class="text-end w-1">
                        <div class="chart-sparkline chart-sparkline-sm" id="sparkline-bounce-rate-1"></div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        /special-promo.html
                        <a href="#" class="ms-1" aria-label="Open website"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 14a3.5 3.5 0 0 0 5 0l4 -4a3.5 3.5 0 0 0 -5 -5l-.5 .5" /><path d="M14 10a3.5 3.5 0 0 0 -5 0l-4 4a3.5 3.5 0 0 0 5 5l.5 -.5" /></svg>
                        </a>
                      </td>
                      <td class="text-muted">3,652</td>
                      <td class="text-muted">3,215</td>
                      <td class="text-muted">76.29%</td>
                      <td class="text-end w-1">
                        <div class="chart-sparkline chart-sparkline-sm" id="sparkline-bounce-rate-2"></div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        /news/1,new-ui-kit.html
                        <a href="#" class="ms-1" aria-label="Open website"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 14a3.5 3.5 0 0 0 5 0l4 -4a3.5 3.5 0 0 0 -5 -5l-.5 .5" /><path d="M14 10a3.5 3.5 0 0 0 -5 0l-4 4a3.5 3.5 0 0 0 5 5l.5 -.5" /></svg>
                        </a>
                      </td>
                      <td class="text-muted">3,256</td>
                      <td class="text-muted">2,865</td>
                      <td class="text-muted">72.65%</td>
                      <td class="text-end w-1">
                        <div class="chart-sparkline chart-sparkline-sm" id="sparkline-bounce-rate-3"></div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        /lorem-ipsum-dolor-sit-amet-very-long-url.html
                        <a href="#" class="ms-1" aria-label="Open website"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 14a3.5 3.5 0 0 0 5 0l4 -4a3.5 3.5 0 0 0 -5 -5l-.5 .5" /><path d="M14 10a3.5 3.5 0 0 0 -5 0l-4 4a3.5 3.5 0 0 0 5 5l.5 -.5" /></svg>
                        </a>
                      </td>
                      <td class="text-muted">986</td>
                      <td class="text-muted">865</td>
                      <td class="text-muted">44.89%</td>
                      <td class="text-end w-1">
                        <div class="chart-sparkline chart-sparkline-sm" id="sparkline-bounce-rate-4"></div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        /colors.html
                        <a href="#" class="ms-1" aria-label="Open website"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 14a3.5 3.5 0 0 0 5 0l4 -4a3.5 3.5 0 0 0 -5 -5l-.5 .5" /><path d="M14 10a3.5 3.5 0 0 0 -5 0l-4 4a3.5 3.5 0 0 0 5 5l.5 -.5" /></svg>
                        </a>
                      </td>
                      <td class="text-muted">912</td>
                      <td class="text-muted">822</td>
                      <td class="text-muted">41.12%</td>
                      <td class="text-end w-1">
                        <div class="chart-sparkline chart-sparkline-sm" id="sparkline-bounce-rate-5"></div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        /docs/index.html
                        <a href="#" class="ms-1" aria-label="Open website"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 14a3.5 3.5 0 0 0 5 0l4 -4a3.5 3.5 0 0 0 -5 -5l-.5 .5" /><path d="M14 10a3.5 3.5 0 0 0 -5 0l-4 4a3.5 3.5 0 0 0 5 5l.5 -.5" /></svg>
                        </a>
                      </td>
                      <td class="text-muted">855</td>
                      <td class="text-muted">798</td>
                      <td class="text-muted">32.65%</td>
                      <td class="text-end w-1">
                        <div class="chart-sparkline chart-sparkline-sm" id="sparkline-bounce-rate-6"></div>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <a href="https://github.com/sponsors/codecalm" class="card card-sponsor" target="_blank" rel="noopener" style="background-image: url(./static/sponsor-banner-homepage.svg)" aria-label="Sponsor Tabler!">
                <div class="card-body"></div>
              </a>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Social Media Traffic</h3>
                </div>
                <table class="table card-table table-vcenter">
                  <thead>
                    <tr>
                      <th>Network</th>
                      <th colspan="2">Visitors</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Instagram</td>
                      <td>3,550</td>
                      <td class="w-50">
                        <div class="progress progress-xs">
                          <div class="progress-bar bg-primary" style="width: 71.0%"></div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>Twitter</td>
                      <td>1,798</td>
                      <td class="w-50">
                        <div class="progress progress-xs">
                          <div class="progress-bar bg-primary" style="width: 35.96%"></div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>Facebook</td>
                      <td>1,245</td>
                      <td class="w-50">
                        <div class="progress progress-xs">
                          <div class="progress-bar bg-primary" style="width: 24.9%"></div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>TikTok</td>
                      <td>986</td>
                      <td class="w-50">
                        <div class="progress progress-xs">
                          <div class="progress-bar bg-primary" style="width: 19.72%"></div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>Pinterest</td>
                      <td>854</td>
                      <td class="w-50">
                        <div class="progress progress-xs">
                          <div class="progress-bar bg-primary" style="width: 17.08%"></div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>VK</td>
                      <td>650</td>
                      <td class="w-50">
                        <div class="progress progress-xs">
                          <div class="progress-bar bg-primary" style="width: 13.0%"></div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>Pinterest</td>
                      <td>420</td>
                      <td class="w-50">
                        <div class="progress progress-xs">
                          <div class="progress-bar bg-primary" style="width: 8.4%"></div>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="col-md-12 col-lg-8">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Tasks</h3>
                </div>
                <div class="table-responsive">
                  <table class="table card-table table-vcenter">
                    <tr>
                      <td class="w-1 pe-0">
                        <input type="checkbox" class="form-check-input m-0 align-middle" aria-label="Select task" checked >
                      </td>
                      <td class="w-100">
                        <a href="#" class="text-reset">Extend the data model.</a>
                      </td>
                      <td class="text-nowrap text-muted">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="4" y="5" width="16" height="16" rx="2" /><line x1="16" y1="3" x2="16" y2="7" /><line x1="8" y1="3" x2="8" y2="7" /><line x1="4" y1="11" x2="20" y2="11" /><line x1="11" y1="15" x2="12" y2="15" /><line x1="12" y1="15" x2="12" y2="18" /></svg>
                        January 01, 2019
                      </td>
                      <td class="text-nowrap">
                        <a href="#" class="text-muted">
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                          2/7
                        </a>
                      </td>
                      <td class="text-nowrap">
                        <a href="#" class="text-muted">
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4" /><line x1="8" y1="9" x2="16" y2="9" /><line x1="8" y1="13" x2="14" y2="13" /></svg>
                          3</a>
                      </td>
                      <td>
                        <span class="avatar avatar-sm" style="background-image: url(./static/avatars/000m.jpg)"></span>
                      </td>
                    </tr>
                    <tr>
                      <td class="w-1 pe-0">
                        <input type="checkbox" class="form-check-input m-0 align-middle" aria-label="Select task" >
                      </td>
                      <td class="w-100">
                        <a href="#" class="text-reset">Verify the event flow.</a>
                      </td>
                      <td class="text-nowrap text-muted">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="4" y="5" width="16" height="16" rx="2" /><line x1="16" y1="3" x2="16" y2="7" /><line x1="8" y1="3" x2="8" y2="7" /><line x1="4" y1="11" x2="20" y2="11" /><line x1="11" y1="15" x2="12" y2="15" /><line x1="12" y1="15" x2="12" y2="18" /></svg>
                        January 01, 2019
                      </td>
                      <td class="text-nowrap">
                        <a href="#" class="text-muted">
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                          3/10
                        </a>
                      </td>
                      <td class="text-nowrap">
                        <a href="#" class="text-muted">
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4" /><line x1="8" y1="9" x2="16" y2="9" /><line x1="8" y1="13" x2="14" y2="13" /></svg>
                          6</a>
                      </td>
                      <td>
                        <span class="avatar avatar-sm">JL</span>
                      </td>
                    </tr>
                    <tr>
                      <td class="w-1 pe-0">
                        <input type="checkbox" class="form-check-input m-0 align-middle" aria-label="Select task" >
                      </td>
                      <td class="w-100">
                        <a href="#" class="text-reset">Database backup and maintenance</a>
                      </td>
                      <td class="text-nowrap text-muted">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="4" y="5" width="16" height="16" rx="2" /><line x1="16" y1="3" x2="16" y2="7" /><line x1="8" y1="3" x2="8" y2="7" /><line x1="4" y1="11" x2="20" y2="11" /><line x1="11" y1="15" x2="12" y2="15" /><line x1="12" y1="15" x2="12" y2="18" /></svg>
                        January 01, 2019
                      </td>
                      <td class="text-nowrap">
                        <a href="#" class="text-muted">
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                          0/6
                        </a>
                      </td>
                      <td class="text-nowrap">
                        <a href="#" class="text-muted">
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4" /><line x1="8" y1="9" x2="16" y2="9" /><line x1="8" y1="13" x2="14" y2="13" /></svg>
                          1</a>
                      </td>
                      <td>
                        <span class="avatar avatar-sm" style="background-image: url(./static/avatars/002m.jpg)"></span>
                      </td>
                    </tr>
                    <tr>
                      <td class="w-1 pe-0">
                        <input type="checkbox" class="form-check-input m-0 align-middle" aria-label="Select task" checked >
                      </td>
                      <td class="w-100">
                        <a href="#" class="text-reset">Identify the implementation team.</a>
                      </td>
                      <td class="text-nowrap text-muted">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="4" y="5" width="16" height="16" rx="2" /><line x1="16" y1="3" x2="16" y2="7" /><line x1="8" y1="3" x2="8" y2="7" /><line x1="4" y1="11" x2="20" y2="11" /><line x1="11" y1="15" x2="12" y2="15" /><line x1="12" y1="15" x2="12" y2="18" /></svg>
                        January 01, 2019
                      </td>
                      <td class="text-nowrap">
                        <a href="#" class="text-muted">
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                          6/10
                        </a>
                      </td>
                      <td class="text-nowrap">
                        <a href="#" class="text-muted">
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4" /><line x1="8" y1="9" x2="16" y2="9" /><line x1="8" y1="13" x2="14" y2="13" /></svg>
                          12</a>
                      </td>
                      <td>
                        <span class="avatar avatar-sm" style="background-image: url(./static/avatars/003m.jpg)"></span>
                      </td>
                    </tr>
                    <tr>
                      <td class="w-1 pe-0">
                        <input type="checkbox" class="form-check-input m-0 align-middle" aria-label="Select task" >
                      </td>
                      <td class="w-100">
                        <a href="#" class="text-reset">Define users and workflow</a>
                      </td>
                      <td class="text-nowrap text-muted">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="4" y="5" width="16" height="16" rx="2" /><line x1="16" y1="3" x2="16" y2="7" /><line x1="8" y1="3" x2="8" y2="7" /><line x1="4" y1="11" x2="20" y2="11" /><line x1="11" y1="15" x2="12" y2="15" /><line x1="12" y1="15" x2="12" y2="18" /></svg>
                        January 01, 2019
                      </td>
                      <td class="text-nowrap">
                        <a href="#" class="text-muted">
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                          3/7
                        </a>
                      </td>
                      <td class="text-nowrap">
                        <a href="#" class="text-muted">
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4" /><line x1="8" y1="9" x2="16" y2="9" /><line x1="8" y1="13" x2="14" y2="13" /></svg>
                          5</a>
                      </td>
                      <td>
                        <span class="avatar avatar-sm" style="background-image: url(./static/avatars/000f.jpg)"></span>
                      </td>
                    </tr>
                    <tr>
                      <td class="w-1 pe-0">
                        <input type="checkbox" class="form-check-input m-0 align-middle" aria-label="Select task" checked >
                      </td>
                      <td class="w-100">
                        <a href="#" class="text-reset">Check Pull Requests</a>
                      </td>
                      <td class="text-nowrap text-muted">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="4" y="5" width="16" height="16" rx="2" /><line x1="16" y1="3" x2="16" y2="7" /><line x1="8" y1="3" x2="8" y2="7" /><line x1="4" y1="11" x2="20" y2="11" /><line x1="11" y1="15" x2="12" y2="15" /><line x1="12" y1="15" x2="12" y2="18" /></svg>
                        January 01, 2019
                      </td>
                      <td class="text-nowrap">
                        <a href="#" class="text-muted">
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                          2/9
                        </a>
                      </td>
                      <td class="text-nowrap">
                        <a href="#" class="text-muted">
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4" /><line x1="8" y1="9" x2="16" y2="9" /><line x1="8" y1="13" x2="14" y2="13" /></svg>
                          3</a>
                      </td>
                      <td>
                        <span class="avatar avatar-sm" style="background-image: url(./static/avatars/001f.jpg)"></span>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Invoices</h3>
                </div>
                <div class="card-body border-bottom py-3">
                  <div class="d-flex">
                    <div class="text-muted">
                      Show
                      <div class="mx-2 d-inline-block">
                        <input type="text" class="form-control form-control-sm" value="8" size="3" aria-label="Invoices count">
                      </div>
                      entries
                    </div>
                    <div class="ms-auto text-muted">
                      Search:
                      <div class="ms-2 d-inline-block">
                        <input type="text" class="form-control form-control-sm" aria-label="Search invoice">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table card-table table-vcenter text-nowrap datatable">
                    <thead>
                      <tr>
                        <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select all invoices"></th>
                        <th class="w-1">No. <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm text-dark icon-thick" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="6 15 12 9 18 15" /></svg>
                        </th>
                        <th>Invoice Subject</th>
                        <th>Client</th>
                        <th>VAT No.</th>
                        <th>Created</th>
                        <th>Status</th>
                        <th>Price</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td>
                        <td><span class="text-muted">001401</span></td>
                        <td><a href="invoice.html" class="text-reset" tabindex="-1">Design Works</a></td>
                        <td>
                          <span class="flag flag-country-us"></span>
                          Carlson Limited
                        </td>
                        <td>
                          87956621
                        </td>
                        <td>
                          15 Dec 2017
                        </td>
                        <td>
                          <span class="badge bg-success me-1"></span> Paid
                        </td>
                        <td>$887</td>
                        <td class="text-end">
                          <span class="dropdown">
                            <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                            <div class="dropdown-menu dropdown-menu-end">
                              <a class="dropdown-item" href="#">
                                Action
                              </a>
                              <a class="dropdown-item" href="#">
                                Another action
                              </a>
                            </div>
                          </span>
                        </td>
                      </tr>
                      <tr>
                        <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td>
                        <td><span class="text-muted">001402</span></td>
                        <td><a href="invoice.html" class="text-reset" tabindex="-1">UX Wireframes</a></td>
                        <td>
                          <span class="flag flag-country-gb"></span>
                          Adobe
                        </td>
                        <td>
                          87956421
                        </td>
                        <td>
                          12 Apr 2017
                        </td>
                        <td>
                          <span class="badge bg-warning me-1"></span> Pending
                        </td>
                        <td>$1200</td>
                        <td class="text-end">
                          <span class="dropdown">
                            <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                            <div class="dropdown-menu dropdown-menu-end">
                              <a class="dropdown-item" href="#">
                                Action
                              </a>
                              <a class="dropdown-item" href="#">
                                Another action
                              </a>
                            </div>
                          </span>
                        </td>
                      </tr>
                      <tr>
                        <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td>
                        <td><span class="text-muted">001403</span></td>
                        <td><a href="invoice.html" class="text-reset" tabindex="-1">New Dashboard</a></td>
                        <td>
                          <span class="flag flag-country-de"></span>
                          Bluewolf
                        </td>
                        <td>
                          87952621
                        </td>
                        <td>
                          23 Oct 2017
                        </td>
                        <td>
                          <span class="badge bg-warning me-1"></span> Pending
                        </td>
                        <td>$534</td>
                        <td class="text-end">
                          <span class="dropdown">
                            <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                            <div class="dropdown-menu dropdown-menu-end">
                              <a class="dropdown-item" href="#">
                                Action
                              </a>
                              <a class="dropdown-item" href="#">
                                Another action
                              </a>
                            </div>
                          </span>
                        </td>
                      </tr>
                      <tr>
                        <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td>
                        <td><span class="text-muted">001404</span></td>
                        <td><a href="invoice.html" class="text-reset" tabindex="-1">Landing Page</a></td>
                        <td>
                          <span class="flag flag-country-br"></span>
                          Salesforce
                        </td>
                        <td>
                          87953421
                        </td>
                        <td>
                          2 Sep 2017
                        </td>
                        <td>
                          <span class="badge bg-secondary me-1"></span> Due in 2 Weeks
                        </td>
                        <td>$1500</td>
                        <td class="text-end">
                          <span class="dropdown">
                            <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                            <div class="dropdown-menu dropdown-menu-end">
                              <a class="dropdown-item" href="#">
                                Action
                              </a>
                              <a class="dropdown-item" href="#">
                                Another action
                              </a>
                            </div>
                          </span>
                        </td>
                      </tr>
                      <tr>
                        <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td>
                        <td><span class="text-muted">001405</span></td>
                        <td><a href="invoice.html" class="text-reset" tabindex="-1">Marketing Templates</a></td>
                        <td>
                          <span class="flag flag-country-pl"></span>
                          Printic
                        </td>
                        <td>
                          87956621
                        </td>
                        <td>
                          29 Jan 2018
                        </td>
                        <td>
                          <span class="badge bg-danger me-1"></span> Paid Today
                        </td>
                        <td>$648</td>
                        <td class="text-end">
                          <span class="dropdown">
                            <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                            <div class="dropdown-menu dropdown-menu-end">
                              <a class="dropdown-item" href="#">
                                Action
                              </a>
                              <a class="dropdown-item" href="#">
                                Another action
                              </a>
                            </div>
                          </span>
                        </td>
                      </tr>
                      <tr>
                        <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td>
                        <td><span class="text-muted">001406</span></td>
                        <td><a href="invoice.html" class="text-reset" tabindex="-1">Sales Presentation</a></td>
                        <td>
                          <span class="flag flag-country-br"></span>
                          Tabdaq
                        </td>
                        <td>
                          87956621
                        </td>
                        <td>
                          4 Feb 2018
                        </td>
                        <td>
                          <span class="badge bg-secondary me-1"></span> Due in 3 Weeks
                        </td>
                        <td>$300</td>
                        <td class="text-end">
                          <span class="dropdown">
                            <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                            <div class="dropdown-menu dropdown-menu-end">
                              <a class="dropdown-item" href="#">
                                Action
                              </a>
                              <a class="dropdown-item" href="#">
                                Another action
                              </a>
                            </div>
                          </span>
                        </td>
                      </tr>
                      <tr>
                        <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td>
                        <td><span class="text-muted">001407</span></td>
                        <td><a href="invoice.html" class="text-reset" tabindex="-1">Logo & Print</a></td>
                        <td>
                          <span class="flag flag-country-us"></span>
                          Apple
                        </td>
                        <td>
                          87956621
                        </td>
                        <td>
                          22 Mar 2018
                        </td>
                        <td>
                          <span class="badge bg-success me-1"></span> Paid Today
                        </td>
                        <td>$2500</td>
                        <td class="text-end">
                          <span class="dropdown">
                            <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                            <div class="dropdown-menu dropdown-menu-end">
                              <a class="dropdown-item" href="#">
                                Action
                              </a>
                              <a class="dropdown-item" href="#">
                                Another action
                              </a>
                            </div>
                          </span>
                        </td>
                      </tr>
                      <tr>
                        <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td>
                        <td><span class="text-muted">001408</span></td>
                        <td><a href="invoice.html" class="text-reset" tabindex="-1">Icons</a></td>
                        <td>
                          <span class="flag flag-country-pl"></span>
                          Tookapic
                        </td>
                        <td>
                          87956621
                        </td>
                        <td>
                          13 May 2018
                        </td>
                        <td>
                          <span class="badge bg-success me-1"></span> Paid Today
                        </td>
                        <td>$940</td>
                        <td class="text-end">
                          <span class="dropdown">
                            <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                            <div class="dropdown-menu dropdown-menu-end">
                              <a class="dropdown-item" href="#">
                                Action
                              </a>
                              <a class="dropdown-item" href="#">
                                Another action
                              </a>
                            </div>
                          </span>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="card-footer d-flex align-items-center">
                  <p class="m-0 text-muted">Showing <span>1</span> to <span>8</span> of <span>16</span> entries</p>
                  <ul class="pagination m-0 ms-auto">
                    <li class="page-item disabled">
                      <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="15 6 9 12 15 18" /></svg>
                        prev
                      </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                    <li class="page-item">
                      <a class="page-link" href="#">
                        next <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="9 6 15 12 9 18" /></svg>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>







	<div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">New report</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label class="form-label">Name</label>
              <input type="text" class="form-control" name="example-text-input" placeholder="Your report name">
            </div>
            <label class="form-label">Report type</label>
            <div class="form-selectgroup-boxes row mb-3">
              <div class="col-lg-6">
                <label class="form-selectgroup-item">
                  <input type="radio" name="report-type" value="1" class="form-selectgroup-input" checked>
                  <span class="form-selectgroup-label d-flex align-items-center p-3">
                    <span class="me-3">
                      <span class="form-selectgroup-check"></span>
                    </span>
                    <span class="form-selectgroup-label-content">
                      <span class="form-selectgroup-title strong mb-1">Simple</span>
                      <span class="d-block text-muted">Provide only basic data needed for the report</span>
                    </span>
                  </span>
                </label>
              </div>
              <div class="col-lg-6">
                <label class="form-selectgroup-item">
                  <input type="radio" name="report-type" value="1" class="form-selectgroup-input">
                  <span class="form-selectgroup-label d-flex align-items-center p-3">
                    <span class="me-3">
                      <span class="form-selectgroup-check"></span>
                    </span>
                    <span class="form-selectgroup-label-content">
                      <span class="form-selectgroup-title strong mb-1">Advanced</span>
                      <span class="d-block text-muted">Insert charts and additional advanced analyses to be inserted in the report</span>
                    </span>
                  </span>
                </label>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-8">
                <div class="mb-3">
                  <label class="form-label">Report url</label>
                  <div class="input-group input-group-flat">
                    <span class="input-group-text">
                      https://tabler.io/reports/
                    </span>
                    <input type="text" class="form-control ps-0"  value="report-01" autocomplete="off">
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="mb-3">
                  <label class="form-label">Visibility</label>
                  <select class="form-select">
                    <option value="1" selected>Private</option>
                    <option value="2">Public</option>
                    <option value="3">Hidden</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-lg-6">
                <div class="mb-3">
                  <label class="form-label">Client name</label>
                  <input type="text" class="form-control">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="mb-3">
                  <label class="form-label">Reporting period</label>
                  <input type="date" class="form-control">
                </div>
              </div>
              <div class="col-lg-12">
                <div>
                  <label class="form-label">Additional information</label>
                  <textarea class="form-control" rows="3"></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
              Cancel
            </a>
            <a href="#" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
              Create new report
            </a>
          </div>
        </div>
      </div>
    </div>

@endsection

@section('js')
<!-- Libs JS -->
<script src="{{asset('template/tabler/dist/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
 <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('chart-revenue-bg'), {
      		chart: {
      			type: "area",
      			fontFamily: 'inherit',
      			height: 40.0,
      			sparkline: {
      				enabled: true
      			},
      			animations: {
      				enabled: false
      			},
      		},
      		dataLabels: {
      			enabled: false,
      		},
      		fill: {
      			opacity: .16,
      			type: 'solid'
      		},
      		stroke: {
      			width: 2,
      			lineCap: "round",
      			curve: "smooth",
      		},
      		series: [{
      			name: "Profits",
      			data: [37, 35, 44, 28, 36, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43, 19, 46, 39, 62, 51, 35, 41, 67]
      		}],
      		grid: {
      			strokeDashArray: 4,
      		},
      		xaxis: {
      			labels: {
      				padding: 0
      			},
      			tooltip: {
      				enabled: false
      			},
      			axisBorder: {
      				show: false,
      			},
      			type: 'datetime',
      		},
      		yaxis: {
      			labels: {
      				padding: 4
      			},
      		},
      		labels: [
      			'2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09', '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14', '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19'
      		],
      		colors: ["#206bc4"],
      		legend: {
      			show: false,
      		},
      	})).render();
      });
      // @formatter:on
    </script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('chart-new-clients'), {
      		chart: {
      			type: "line",
      			fontFamily: 'inherit',
      			height: 40.0,
      			sparkline: {
      				enabled: true
      			},
      			animations: {
      				enabled: false
      			},
      		},
      		fill: {
      			opacity: 1,
      		},
      		stroke: {
      			width: [2, 1],
      			dashArray: [0, 3],
      			lineCap: "round",
      			curve: "smooth",
      		},
      		series: [{
      			name: "May",
      			data: [37, 35, 44, 28, 36, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43, 4, 46, 39, 62, 51, 35, 41, 67]
      		},{
      			name: "April",
      			data: [93, 54, 51, 24, 35, 35, 31, 67, 19, 43, 28, 36, 62, 61, 27, 39, 35, 41, 27, 35, 51, 46, 62, 37, 44, 53, 41, 65, 39, 37]
      		}],
      		grid: {
      			strokeDashArray: 4,
      		},
      		xaxis: {
      			labels: {
      				padding: 0
      			},
      			tooltip: {
      				enabled: false
      			},
      			type: 'datetime',
      		},
      		yaxis: {
      			labels: {
      				padding: 4
      			},
      		},
      		labels: [
      			'2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09', '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14', '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19'
      		],
      		colors: ["#206bc4", "#a8aeb7"],
      		legend: {
      			show: false,
      		},
      	})).render();
      });
      // @formatter:on
    </script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('chart-active-users'), {
      		chart: {
      			type: "bar",
      			fontFamily: 'inherit',
      			height: 40.0,
      			sparkline: {
      				enabled: true
      			},
      			animations: {
      				enabled: false
      			},
      		},
      		plotOptions: {
      			bar: {
      				columnWidth: '50%',
      			}
      		},
      		dataLabels: {
      			enabled: false,
      		},
      		fill: {
      			opacity: 1,
      		},
      		series: [{
      			name: "Profits",
      			data: [37, 35, 44, 28, 36, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43, 19, 46, 39, 62, 51, 35, 41, 67]
      		}],
      		grid: {
      			strokeDashArray: 4,
      		},
      		xaxis: {
      			labels: {
      				padding: 0
      			},
      			tooltip: {
      				enabled: false
      			},
      			axisBorder: {
      				show: false,
      			},
      			type: 'datetime',
      		},
      		yaxis: {
      			labels: {
      				padding: 4
      			},
      		},
      		labels: [
      			'2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09', '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14', '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19'
      		],
      		colors: ["#206bc4"],
      		legend: {
      			show: false,
      		},
      	})).render();
      });
      // @formatter:on
    </script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('chart-mentions'), {
      		chart: {
      			type: "bar",
      			fontFamily: 'inherit',
      			height: 240,
      			parentHeightOffset: 0,
      			toolbar: {
      				show: false,
      			},
      			animations: {
      				enabled: false
      			},
      			stacked: true,
      		},
      		plotOptions: {
      			bar: {
      				columnWidth: '50%',
      			}
      		},
      		dataLabels: {
      			enabled: false,
      		},
      		fill: {
      			opacity: 1,
      		},
      		series: [{
      			name: "Web",
      			data: [1, 0, 0, 0, 0, 1, 1, 0, 0, 0, 2, 12, 5, 8, 22, 6, 8, 6, 4, 1, 8, 24, 29, 51, 40, 47, 23, 26, 50, 26, 41, 22, 46, 47, 81, 46, 6]
      		},{
      			name: "Social",
      			data: [2, 5, 4, 3, 3, 1, 4, 7, 5, 1, 2, 5, 3, 2, 6, 7, 7, 1, 5, 5, 2, 12, 4, 6, 18, 3, 5, 2, 13, 15, 20, 47, 18, 15, 11, 10, 0]
      		},{
      			name: "Other",
      			data: [2, 9, 1, 7, 8, 3, 6, 5, 5, 4, 6, 4, 1, 9, 3, 6, 7, 5, 2, 8, 4, 9, 1, 2, 6, 7, 5, 1, 8, 3, 2, 3, 4, 9, 7, 1, 6]
      		}],
      		grid: {
      			padding: {
      				top: -20,
      				right: 0,
      				left: -4,
      				bottom: -4
      			},
      			strokeDashArray: 4,
      			xaxis: {
      				lines: {
      					show: true
      				}
      			},
      		},
      		xaxis: {
      			labels: {
      				padding: 0
      			},
      			tooltip: {
      				enabled: false
      			},
      			axisBorder: {
      				show: false,
      			},
      			type: 'datetime',
      		},
      		yaxis: {
      			labels: {
      				padding: 4
      			},
      		},
      		labels: [
      			'2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09', '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14', '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19', '2020-07-20', '2020-07-21', '2020-07-22', '2020-07-23', '2020-07-24', '2020-07-25', '2020-07-26'
      		],
      		colors: ["#206bc4", "#79a6dc", "#bfe399"],
      		legend: {
      			show: true,
      			position: 'bottom',
      			height: 32,
      			offsetY: 8,
      			markers: {
      				width: 8,
      				height: 8,
      				radius: 100,
      			},
      			itemMargin: {
      				horizontal: 8,
      			},
      		},
      	})).render();
      });
      // @formatter:on
    </script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-activity'), {
      		chart: {
      			type: "radialBar",
      			fontFamily: 'inherit',
      			height: 40,
      			width: 40,
      			animations: {
      				enabled: false
      			},
      			sparkline: {
      				enabled: true
      			},
      		},
      		tooltip: {
      			enabled: false,
      		},
      		plotOptions: {
      			radialBar: {
      				hollow: {
      					margin: 0,
      					size: '75%'
      				},
      				track: {
      					margin: 0
      				},
      				dataLabels: {
      					show: false
      				}
      			}
      		},
      		colors: ["#206bc4"],
      		series: [35],
      	})).render();
      });
      // @formatter:on
    </script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('chart-development-activity'), {
      		chart: {
      			type: "area",
      			fontFamily: 'inherit',
      			height: 192,
      			sparkline: {
      				enabled: true
      			},
      			animations: {
      				enabled: false
      			},
      		},
      		dataLabels: {
      			enabled: false,
      		},
      		fill: {
      			opacity: .16,
      			type: 'solid'
      		},
      		stroke: {
      			width: 2,
      			lineCap: "round",
      			curve: "smooth",
      		},
      		series: [{
      			name: "Purchases",
      			data: [3, 5, 4, 6, 7, 5, 6, 8, 24, 7, 12, 5, 6, 3, 8, 4, 14, 30, 17, 19, 15, 14, 25, 32, 40, 55, 60, 48, 52, 70]
      		}],
      		grid: {
      			strokeDashArray: 4,
      		},
      		xaxis: {
      			labels: {
      				padding: 0
      			},
      			tooltip: {
      				enabled: false
      			},
      			axisBorder: {
      				show: false,
      			},
      			type: 'datetime',
      		},
      		yaxis: {
      			labels: {
      				padding: 4
      			},
      		},
      		labels: [
      			'2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09', '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14', '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19'
      		],
      		colors: ["#206bc4"],
      		legend: {
      			show: false,
      		},
      		point: {
      			show: false
      		},
      	})).render();
      });
      // @formatter:on
    </script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-bounce-rate-1'), {
      		chart: {
      			type: "line",
      			fontFamily: 'inherit',
      			height: 24,
      			animations: {
      				enabled: false
      			},
      			sparkline: {
      				enabled: true
      			},
      		},
      		tooltip: {
      			enabled: false,
      		},
      		stroke: {
      			width: 2,
      			lineCap: "round",
      		},
      		series: [{
      			color: "#206bc4",
      			data: [17, 24, 20, 10, 5, 1, 4, 18, 13]
      		}],
      	})).render();
      });
      // @formatter:on
    </script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-bounce-rate-2'), {
      		chart: {
      			type: "line",
      			fontFamily: 'inherit',
      			height: 24,
      			animations: {
      				enabled: false
      			},
      			sparkline: {
      				enabled: true
      			},
      		},
      		tooltip: {
      			enabled: false,
      		},
      		stroke: {
      			width: 2,
      			lineCap: "round",
      		},
      		series: [{
      			color: "#206bc4",
      			data: [13, 11, 19, 22, 12, 7, 14, 3, 21]
      		}],
      	})).render();
      });
      // @formatter:on
    </script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-bounce-rate-3'), {
      		chart: {
      			type: "line",
      			fontFamily: 'inherit',
      			height: 24,
      			animations: {
      				enabled: false
      			},
      			sparkline: {
      				enabled: true
      			},
      		},
      		tooltip: {
      			enabled: false,
      		},
      		stroke: {
      			width: 2,
      			lineCap: "round",
      		},
      		series: [{
      			color: "#206bc4",
      			data: [10, 13, 10, 4, 17, 3, 23, 22, 19]
      		}],
      	})).render();
      });
      // @formatter:on
    </script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-bounce-rate-4'), {
      		chart: {
      			type: "line",
      			fontFamily: 'inherit',
      			height: 24,
      			animations: {
      				enabled: false
      			},
      			sparkline: {
      				enabled: true
      			},
      		},
      		tooltip: {
      			enabled: false,
      		},
      		stroke: {
      			width: 2,
      			lineCap: "round",
      		},
      		series: [{
      			color: "#206bc4",
      			data: [6, 15, 13, 13, 5, 7, 17, 20, 19]
      		}],
      	})).render();
      });
      // @formatter:on
    </script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-bounce-rate-5'), {
      		chart: {
      			type: "line",
      			fontFamily: 'inherit',
      			height: 24,
      			animations: {
      				enabled: false
      			},
      			sparkline: {
      				enabled: true
      			},
      		},
      		tooltip: {
      			enabled: false,
      		},
      		stroke: {
      			width: 2,
      			lineCap: "round",
      		},
      		series: [{
      			color: "#206bc4",
      			data: [2, 11, 15, 14, 21, 20, 8, 23, 18, 14]
      		}],
      	})).render();
      });
      // @formatter:on
    </script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-bounce-rate-6'), {
      		chart: {
      			type: "line",
      			fontFamily: 'inherit',
      			height: 24,
      			animations: {
      				enabled: false
      			},
      			sparkline: {
      				enabled: true
      			},
      		},
      		tooltip: {
      			enabled: false,
      		},
      		stroke: {
      			width: 2,
      			lineCap: "round",
      		},
      		series: [{
      			color: "#206bc4",
      			data: [22, 12, 7, 14, 3, 21, 8, 23, 18, 14]
      		}],
      	})).render();
      });
      // @formatter:on
    </script>
	
@endsection