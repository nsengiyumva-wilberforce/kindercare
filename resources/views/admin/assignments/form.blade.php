<style>
        .button4{
        background-color: lightseagreen;
        color: white;
        height: 40px;
        width: 100px;
        border-radius: 5px;
        border-color: lightseagreen;
        shadow: none;
        font-weight: bold
    }
</style>

<div class="form-group">
    <label for="assignment_title" class="control-label">{{ 'Assignment Title' }}</label>
    <input class="form-control" name="assignment_title" type="text" id="assignment_title" value="{{ isset($assignment->assignment_title) ? $assignment->assignment_title : ''}}" >
</div>
<div class="form-group">
    <label for="characters" class="control-label">{{ 'Characters' }}</label>
    <input class="form-control" name="characters" size="8" type="text" id="characters" value="{{ isset($assignment->characters) ? $assignment->characters : ''}}" >
</div>
<div class="form-group">
    <label for="start_time" class="control-label">{{ 'Start Time' }}</label>
    <input class="form-control" name="start_time" type="date" id="start_time" value="{{ isset($assignment->start_time) ? $assignment->start_time : ''}}" >
</div>
<div class="form-group">
    <label for="end_time" class="control-label">{{ 'End Time' }}</label>
    <input class="form-control" name="end_time" type="date" id="end_time" value="{{ isset($assignment->end_time) ? $assignment->end_time : ''}}" >
</div>
<div class="form-group">
    <input class="button4" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>