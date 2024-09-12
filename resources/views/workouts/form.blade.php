<!-- resources/views/workouts/form.blade.php -->

<div class="mb-4">
    <label for="exercise" class="block text-sm font-medium text-gray-700">Exercise</label>
    <input type="text" id="exercise" name="exercise" value="{{ old('exercise', $workout->exercise ?? '') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('exercise') border-red-500 @enderror">
    @error('exercise')
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label for="sets" class="block text-sm font-medium text-gray-700">Sets</label>
    <input type="number" id="sets" name="sets" value="{{ old('sets', $workout->sets ?? '') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('sets') border-red-500 @enderror">
    @error('sets')
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label for="reps" class="block text-sm font-medium text-gray-700">Reps</label>
    <input type="number" id="reps" name="reps" value="{{ old('reps', $workout->reps ?? '') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('reps') border-red-500 @enderror">
    @error('reps')
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label for="weight" class="block text-sm font-medium text-gray-700">Weight (kg)</label>
    <input type="number" id="weight" name="weight" value="{{ old('weight', $workout->weight ?? '') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('weight') border-red-500 @enderror">
    @error('weight')
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>
