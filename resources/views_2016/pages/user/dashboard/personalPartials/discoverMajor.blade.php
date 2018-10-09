<div class="modal hrc-dashboard-modal fade" id="discoverYourself" tabindex="-1" role="dialog" aria-labelledby="discoverYourselfLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-header">
            <button type="button" class="btn-modal-close" data-dismiss="modal" aria-label="Close"></button>

            Tìm hiểu về ngành:
        </div>

        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-body-wrapper text-center">
                    <button type="button" data-toggle="modal" data-target="#discoverFinance" class="btn btn-discover-major">Finance</button>

                    <button type="button" data-toggle="modal" data-target="#discoverHumanResources" class="btn btn-discover-major">Human Resources</button>

                    <button type="button" data-toggle="modal" data-target="#discoverLogistics" class="btn btn-discover-major">Logistics</button>

                    <button type="button" data-toggle="modal" data-target="#discoverMarketingAndSales" class="btn btn-discover-major">Marketing & Sales</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal hrc-dashboard-modal fade" id="discoverFinance" tabindex="-1" role="dialog" aria-labelledby="discoverFinanceLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-header">
            <button type="button" class="btn-modal-close" data-dismiss="modal" aria-label="Close"></button>

            <span class="color-1"><b>Finance</b></span>
        </div>

        <div class="modal-content">
            <div class="modal-body">
                <div class="paragraph">
                    @include('pages.user.dashboard.personalPartials.finance')
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal hrc-dashboard-modal fade" id="discoverHumanResources" tabindex="-1" role="dialog" aria-labelledby="discoverHumanResourcesLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-header">
            <button type="button" class="btn-modal-close" data-dismiss="modal" aria-label="Close"></button>

            <span class="color-1"><b>Human Resources</b></span>
        </div>

        <div class="modal-content">
            <div class="modal-body">
                <div class="paragraph">
                    @include('pages.user.dashboard.personalPartials.humanResources')
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal hrc-dashboard-modal fade" id="discoverLogistics" tabindex="-1" role="dialog" aria-labelledby="discoverLogisticsLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-header">
            <button type="button" class="btn-modal-close" data-dismiss="modal" aria-label="Close"></button>

            <span class="color-1"><b>Logistics</b></span>
        </div>

        <div class="modal-content">
            <div class="modal-body">
                <div class="paragraph">
                    @include('pages.user.dashboard.personalPartials.logistics')
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal hrc-dashboard-modal fade" id="discoverMarketingAndSales" tabindex="-1" role="dialog" aria-labelledby="discoverMarketingAndSalesLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-header">
            <button type="button" class="btn-modal-close" data-dismiss="modal" aria-label="Close"></button>

            <span class="color-1"><b>Marketing & Sales</b></span>
        </div>

        <div class="modal-content">
            <div class="modal-body">
                <div class="paragraph">
                    @include('pages.user.dashboard.personalPartials.marketingAndSales')
                </div>
            </div>
        </div>
    </div>
</div>