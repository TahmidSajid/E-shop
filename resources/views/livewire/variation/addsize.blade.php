<div class="row">
    <div class="col-xl-6 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add Size</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form wire:submit="add_size">
                        <div class="input-group mb-3">
                            <label class="col-sm-2 col-form-label col-form-label-lg">Size</label>
                            <input type="text" class="form-control" wire:model="size">
                            <div class="input-group-append">
                                <button class="btn btn-primary" id="btn-loading" type="submit">
                                    <Span id="text-loading">
                                        Add size
                                    </Span>
                                    <div class="spinner-border text-light d-none" id="spin-loading" role="status">

                                    </div>
                                </button>
                            </div>
                        </div>
                        @error('size')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Sizes </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-responsive-sm text-center">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Size</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($sizes as $size)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $size->size }}</td>
                                    <td>
                                        <button type="button" wire:click = "delete({{ $size->id }})"
                                            class="btn btn-sm btn-danger">
                                            <i class="fa fa-close"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

