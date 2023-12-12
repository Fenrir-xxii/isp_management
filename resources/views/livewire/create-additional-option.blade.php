<div class="card-body">

    <form wire:submit.prevent="register" action="#" method="POST" role="form text-left">
            <div class="mb-3">
                <div class="@error('title') border border-danger rounded-3  @enderror">
                    <input wire:model="title" type="text" class="form-control" placeholder="Title" aria-label="title"
                        aria-describedby="email-addon">
                </div>
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <div class="@error('price') border border-danger rounded-3 @enderror">
                    <input wire:model="price" type="number" class="form-control" placeholder="Price" aria-label="price"
                        aria-describedby="email-addon">
                </div>
                @error('price')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <div class="@error('description') border border-danger rounded-3  @enderror">
                    <input wire:model="description" type="text" class="form-control" placeholder="Description" aria-label="description"
                        aria-describedby="email-addon">
                </div>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        <div class="text-center">
            <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Create</button>
        </div>
    </form>
</div>
