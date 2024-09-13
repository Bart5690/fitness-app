<div class="mb-4">
    <label for="exercise" class="block text-sm font-medium text-gray-700">Oefening</label>
    <input type="text" id="exercise" name="exercise" value="{{ old('exercise', $workout->exercise ?? '') }}" class="form-input">
</div>

<div class="mb-4">
    <label for="sets" class="block text-sm font-medium text-gray-700">Sets</label>
    <input type="number" id="sets" name="sets" value="{{ old('sets', $workout->sets ?? '') }}" class="form-input">
</div>

<div class="mb-4">
    <label for="reps" class="block text-sm font-medium text-gray-700">Reps</label>
    <input type="number" id="reps" name="reps" value="{{ old('reps', $workout->reps ?? '') }}" class="form-input">
</div>

<div class="mb-4">
    <label for="weight" class="block text-sm font-medium text-gray-700">Weight (Kg)</label>
    <input type="number" id="weight" name="weight" value="{{ old('weight', $workout->weight ?? '') }}" step="0.01" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('weight') border-red-500 @enderror">
    @error('weight')
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>


<div class="mb-4">
    <label for="musclegroup_id" class="block text-sm font-medium text-gray-700">Spiergroep</label>
    <select id="musclegroup_id" name="musclegroup_id" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
        <option value="">Select Muscle Group</option>
        @foreach($musclegroups as $musclegroup)
            <option value="{{ $musclegroup->id }}" {{ old('musclegroup_id') == $musclegroup->id ? 'selected' : '' }}>
                {{ $musclegroup->name }}
            </option>
        @endforeach
    </select>
    @error('musclegroup_id')
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>



