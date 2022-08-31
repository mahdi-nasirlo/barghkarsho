<div>
    @if (auth()->user() and $checkDelivery)
        <form wire:submit.prevent='saveinformation'>
            <div class="row">
                <div class="col-lg-6 col-12 mb-30">
                    <input wire:model='name' id="first-name" placeholder="نام تحویل گیردنده" type="text">
                    @error('name')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-lg-6 col-12 mb-30">
                    <input wire:model='state' id="last-name" placeholder="استان" type="text">
                    @error('state')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="col-12 mb-30">
                    <input wire:model='city' id="display-name" placeholder="شهرستان" type="text">
                    @error('city')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="col-12 mb-30">
                    <input wire:model='address' id="display-name" placeholder="آدرس" type="text">
                    @error('address')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="col-12 mb-30">
                    <input wire:model='post' id="display-name" placeholder="کد پستی" type="text">
                    @error('post')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="col-12 mb-30">
                    <input wire:model='mobile' id="display-name" placeholder="شماره همراه" type="text">
                    @error('mobile')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-hover-secondary">ذخیره تغییرات</button>
                </div>

            </div>
        </form>
    @endif
</div>
