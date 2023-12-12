<div class="card-body">

    <form wire:submit.prevent="register" action="#" method="POST" role="form text-left">
            <div class="mb-3">
                <div class="@error('selected_option') border border-danger rounded-3 @enderror">
                    <select wire:model="selected_option" class="form-control">
                        <option value="null" selected disabled>Select option</option>
                        @foreach($additional_options as $option)
                            <option value="{{$option->id}}">{{$option->title . " (" .$option->price . " ₴)"}}</option>
                        @endforeach
                    </select>
                </div>
                @error('selected_option')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        <div class="text-center">
            <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Add</button>
        </div>
    </form>

</div>

