<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add Color</h4>
            </div>
            <div class="card-body">
                <form wire:submit="add_color">
                    <div class="row">
                        <div class="col-xl-4 col-lg-6 mb-3">

                            <div class="example">
                                <p class="mb-1">Pick Color</p>
                                <input type="color" class="as_colorpicker form-control" wire:model="code"
                                    id="color_pick">
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 mb-3">
                            <div class="example">
                                <p class="mb-1">Color Code</p>
                                <input type="text" class="form-control" id="color_code" wire:model.live="code"
                                    readonly required>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 mb-3">
                            <div class="example">
                                <p class="mb-1">Color Name</p>
                                <input type="text" class="form-control" id="color_name" required readonly>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary" id="btn-loading" type="submit">
                        <Span id="text-loading">
                            Add color
                        </Span>
                        <div class="spinner-border text-light d-none" id="spin-loading" role="status">

                        </div>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Colors </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-responsive-sm text-center">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Color code</th>
                                <th>Color Name</th>
                                <th>Color</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($colors as $color)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td id="color_code_table">{{ $color->color_code }}</td>
                                    <td id="color_name_table"></td>
                                    <td>
                                        <div style="border-radius: 50%; height:65px; background-color:{{  $color->color_code }};"></div>
                                    </td>
                                    <td>
                                        <button type="button" wire:click = "delete({{ $color->id }})"
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
