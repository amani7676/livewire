   <div class="card">
        <div class="card-body">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <div class="container">
                <h6 class="card-title">ایجاد کاربر</h6>
                <form wire:submit="saveUser">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">نام و نام خانوادگی</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-left" dir="rtl" wire:model="name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">ایمیل</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-left" dir="rtl" wire:model="email">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">موبایل</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-left" dir="rtl"
                                wire:model.blur="mobile">
                            @error('mbile')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">پسورد</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-left" dir="rtl" wire:model="password">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="file"> آپلود عکس </label>
                        <input class="col-sm-10" type="file" class="form-control-file" id="file"
                            wire:model="photo">
                        @if ($photo)
                            <img src="{{ $photo->temporaryUrl() }}">
                        @endif
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group row">
                        @if ($editUserIndex == null)
                            <button type="submit" class="btn btn-success btn-uppercase">
                                <i class="ti-check-box m-r-5"></i> کاربر جدید
                            </button>
                        @endif


                    </div>
                </form>
            </div>
        </div>

    </div>
