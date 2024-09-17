<div class="form-group">
    <label for="name">Name</label>
    <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}" class="form-control">
    @error('name')
    <p class="invalid-feedback">
        {{ $message }}
    </p>
    @enderror
</div>

<div class="form-group">
    <label for="description">Description</label>
    <textarea name="description" id="description" class="form-control" rows="4">{{ old('description', $category->description) }}</textarea>
    @error('description')
    <p class="invalid-feedback">
        {{ $message }}
    </p>
    @enderror
</div>

<div class="form-group">
    <label for="parent_id">Parent ID</label>
    <select id="parent_id" name="parent_id" class="form-control">
        <option value="">No Parent</option>
        @foreach ($parents as $parent)
            <option value="{{ $parent->id }}" @if($parent->id == old('parent_id', $category->parent_id)) selected @endif>
                {{ $parent->name }}
            </option>
        @endforeach
    </select>
    @error('parent_id')
    <p class="text-danger">
        {{ $message }}
    </p>
    @enderror
</div>

<div class="form-group">
    <label for="art_file">Upload Image</label>
    <input type="file" id="art_file" name="art_file" class="form-control">
</div>

<div class="form-group text-center">
    <button type="submit" class="btn btn-primary">Save</button>
</div>
