<div class="mb-4">
    <label for="name" class="block text-sm font-medium text-gray-700">Muscle Group</label>
    <select id="name" name="name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm">
        <option value="">Select Muscle Group</option>
        <option value="Borst" {{ old('name', $musclegroup->name ?? '') == 'Borst' ? 'selected' : '' }}>Borst</option>
        <option value="Rug" {{ old('name', $musclegroup->name ?? '') == 'Rug' ? 'selected' : '' }}>Rug</option>
        <option value="Schouders" {{ old('name', $musclegroup->name ?? '') == 'Schouders' ? 'selected' : '' }}>Schouders</option>
        <option value="Biceps" {{ old('name', $musclegroup->name ?? '') == 'Biceps' ? 'selected' : '' }}>Biceps</option>
        <option value="Triceps" {{ old('name', $musclegroup->name ?? '') == 'Triceps' ? 'selected' : '' }}>Triceps</option>
        <option value="Abs" {{ old('name', $musclegroup->name ?? '') == 'Abs' ? 'selected' : '' }}>Abs</option>
        <option value="Benen" {{ old('name', $musclegroup->name ?? '') == 'Benen' ? 'selected' : '' }}>Benen</option>
    </select>
</div>

<div class="mb-4">
    <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
    <input type="file" id="image" name="image" class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-md shadow-sm">
</div>
