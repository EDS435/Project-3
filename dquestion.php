<?php
?>
<head>
    <title>Display Users Questions</title>
</head>
<body>
<a href=".?action=display_question_form&userId=<?php echo $userId; ?>">Add Question</a>
<a href=".?action=display_questions&userId<?php echo $userId; ?>&listType=all">All Questions</a>

</body>
<table>
    <tr>
        <th>Question Of Choice</th>
        <th>Question Body</th>
        <th>Question Skills</th>
    </tr>
    <?php foreach ($questions as $question) : ?>
        <tr>
            <td><?php echo $question['title']; ?></td>
            <td><?php echo $question['body']; ?></td>
            <td><?php echo $question['skills']; ?></td>
        </tr>
        <td>
            <form action="." method="post">
                <input type="hidden" name="action" value="delete_question">
                <input type="hidden" name="questionId" value="<?php echo $question['id']; ?>">
                <input type="hidden" name="userId" value="<?php echo $userId; ?>">
                <input type="submit" value="Delete Question">
                <input type="submit" value="Edit Question">
            </form>
        </td>
</table>


