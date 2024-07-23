<div class="mt-4">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Daftar Order</li>
        </ol>
    </nav>

    <!-- Alert Message -->
    <div class="row mb-3">
        <div class="col-md-12">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>
    </div>

    <!-- Order Management -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <!-- Search Bar -->
                    <div class="row align-items-center mb-3">
                        <div class="col-md-4 mt-3 mt-md-0">
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-search"></i></span>
                                <input wire:model.live.debounce.300ms='search' type="text" class="form-control" placeholder="Search">
                            </div>
                        </div>
                    </div>

                    <!-- Orders Table -->
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Kode Pesanan</th>
                                    <th scope="col">Waktu Selesai</th>
                                    <th scope="col">Penjualan</th>
                                    <th scope="col">Uang dibayarkan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $item)
                                    <tr>
                                        <td>{{ $item->invoice_number }}</td>
                                        <td>{{ $item->done_at_for_human }}</td>
                                        <td>{{ $item->total_price_formatted }}</td>
                                        <td>{{ $item->paid_amount_formatted }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination and Items Per Page -->
                    <div class="row align-items-center">
                        <div class="col-md-2">
                            <label for="perPage" class="form-label">Per Page</label>
                            <select wire:model.live='perPage' class="form-select" id="perPage">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                        <div class="col-md-10">
                            {{ $orders->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
