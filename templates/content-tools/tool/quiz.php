<div class="content quizcontent-wrap">
	<?php
		function getQuizAnswer($metaId,$title) {
			$quizAnswers = updateGroupUserMeta($metaId,'quizAnswer');
			if ($quizAnswers) {
				$quizAnswers = json_decode($quizAnswers,true);
				foreach ($quizAnswers as $key => $quizAnswer) {
					if (urldecode($quizAnswer['title']) == $title) {
						return urldecode($quizAnswer['answer']);
					}
				}
			}
			return "";
		}

		$quizContent = get_field('quiz_analysi_content_tools');
		if(count($quizContent)) {
			foreach ($quizContent as $key => $quiz) {
				$quizAnswer = getQuizAnswer($metaId,$quiz['question']);
				?>
					<div class="maincontent-wrap <?= $quizAnswer ? 'marked' : '';?>">
						<h2>
							<span class="quiz-numb"><?= $key+1; ?>. </span>
							<span class="quiz-headtitle"><?= $quiz['question']; ?></span>
						</h2>
						<?php
							if($quiz['is_quiz']) {
								if (count($quiz['quiz_options'])) {
									echo "<div class='quiz-options ".($quizAnswer ? 'marked' : '')."'>";
										foreach ($quiz['quiz_options'] as $key => $option) {

											$class = '';
											if ($quizAnswer) {
												$class = 'mark-red';
												if ($option['option'] == $quizAnswer) {
													$class = 'active mark-green';
												}

												if ($option['is_answer']) {
													$class .= ' correct-answer';
												}
											}


											echo "<button data-val='".$option['is_answer']."' class='".$class."'>".$option['option']."</button>";
										}
									echo "</div>";
								}
							?>
						<?php } else { ?>
							<textarea rows="10" style="width: 100%;" disabled="<?= $quizAnswer ? 'true' : 'false';?>"><?= $quizAnswer;?></textarea>
						<?php } ?>
					</div>
                    <div class="symptoms-buttons">
                        <a href="#" class="symptoms-btn symptoms-btn--light gilda">Back</a>
                        <a href="#" class="symptoms-btn symptoms-btn--dark gilda">Next</a>
                    </div>
				<?php
			}
		}
	?>
</div>