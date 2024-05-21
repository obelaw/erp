<div>
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Sales Analysis
                    </h2>
                    <div class="text-secondary mt-1">
                        This report from <b>{{ $date_from }}</b> to <b>{{ $date_to }}</b>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row g-4">
                <div class="col-3">
                    <form autocomplete="off" novalidate wire:submit="submitFilter">
                        <div class="subheader mb-2">Report Type</div>
                        <div>
                            <select wire:model="report" class="form-select">
                                <option value="sales">sales</option>
                                <option value="product">product</option>
                            </select>
                        </div>

                        <div class="subheader mb-2">Duration</div>
                        <div>
                            <select wire:model="duration" class="form-select">
                                <option value="today">Today</option>
                                <option value="current_month">Current Month</option>
                                <option value="last_month">Last Month</option>
                                <option value="current_year">Current Year</option>
                                <option value="last_year">Last Year</option>
                                <option value="max">Max</option>
                            </select>
                        </div>
                        <div class="mt-5">
                            <button type="submit" class="btn btn-primary w-100">
                                Confirm Filter
                            </button>

                            <button wire:click="exportFilter" class="btn btn-info w-100 mt-3">
                                Export Filter
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-9">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="card-title">Development activity</div>
                        </div>
                        <x-obelaw-chart-component id="report" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
