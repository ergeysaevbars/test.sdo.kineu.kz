<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Форма обучения</th>
        <th scope="col">Год поступления</th>
        <th scope="col">Отметить</th>
    </tr>
    </thead>
    <tbody>
    @foreach($speciality->groups as $group)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $group->spec_forma }}</td>
            <td>{{ $group->spec_year }}</td>
            <td><input type="checkbox" class="form-check-input" name="specialnost_id[{{ $group->spec_id }}]"></td>
        </tr>
    @endforeach
    </tbody>
</table>