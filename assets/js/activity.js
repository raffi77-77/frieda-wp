jQuery(document).ready(function () {
	function shoWHideDiv(id, time = 3000) {
		jQuery(id).show(200);
		setTimeout(() => {
			jQuery(id).removeClass('success')
			jQuery(id).removeClass('error')
			jQuery(id).hide(200);
		}, time);
	}

	jQuery(document).on('click', ".quiz-options button, .symptoms-block button", function (e) {
		let inputClass = jQuery(this).closest('div').data('id') 
		jQuery(`.${inputClass}-section`).show()

		let isMarked = jQuery(this).closest('div').hasClass('marked')

		let isMultiple = jQuery(this).closest('div').hasClass('multiple')

		let isActive = jQuery(this).hasClass('active')
		if (isMultiple && isActive) {
			jQuery(this).removeClass('active');
			jQuery(this).find('input').prop('checked', false);
		} else if (!isMarked) {
			if (!isMultiple) {
				jQuery(this).closest('div').find('button').removeClass('active');
				jQuery(this).closest('div').find('input').prop('checked', false);
			}

			jQuery(this).addClass('active');
			jQuery(this).find('input').prop('checked', true);
			jQuery(this).closest('.symptoms-wrap').find('.error-question').hide()
		}
	})

	jQuery(document).on('click', ".tabs li", function (e) {
		e.preventDefault();
		jQuery('.tabs li').removeClass('active');
		jQuery('.twoblocks').hide();
		jQuery(this).addClass('active');
		let tab = jQuery(this).attr('id');
		jQuery(`.${tab}`).show();
	})

	jQuery(".symptoms-wrap .textarea-block textarea").on("keyup change", function (e) {
		jQuery(this).next().hide()
	})

	jQuery(document).on('click', ".download-certificate-button", function (e) {
		e.preventDefault();
		jQuery('#download-certificate').show();
	})

	jQuery(document).on('click', "#download-certificate .closebutton", function (e) {
		e.preventDefault();
		jQuery('#download-certificate').hide();
	})

	jQuery(document).on('click', ".download-btn", function (e) {
		e.preventDefault();
		window.open(jQuery(this).attr('pdf'), '_blank');
		jQuery('#download-certificate').hide();
	})

	jQuery(document).on('click', "#evaluation-popup", function (e) {
		e.preventDefault();
		jQuery('#feedback').show();
	})

	jQuery(document).on('click', "#feedback .closebtn-popup", function (e) {
		e.preventDefault();
		jQuery('#feedback').hide();
	})

	jQuery(document).on('click', ".submit-activity", function (e) {
		e.preventDefault();
		let id = jQuery('.toolscontent-wrap').attr('id')
		let isQuiz = jQuery(this).attr('id')
		let action = "_onActivitySubmit"
		let quizAnswer = []

		let error = false
		// quizcontent-wrap
		jQuery('.quizcontent-wrap .maincontent-wrap').each(function (i, item) {
			let type = ''
			let answer = ''
			let title = jQuery(item).find('.quiz-headtitle').text();
			title = encodeURIComponent(title)

			if (jQuery(item).find('button').length) {
				type = 'quiz'
				answer = jQuery(item).find('button.active').text();
			} else if (jQuery(item).find('textarea').length) {
				type = 'text'
				answer = jQuery(item).find('textarea').val();
			}
			answer = encodeURIComponent(answer)

			if (!answer) {
				error = true
				jQuery('#show-res').text('All Question Required.')
				jQuery('#show-res').addClass('error')
				shoWHideDiv('#show-res', 10000)
				return
			}
			quizAnswer.push({ answer, title, type });
		});

		let { isTrackerFrom } = window
		if (!error) {;
			let submitActivity = jQuery('.submit-activity')
			jQuery.ajax({
				type: "post",
				url: ajaxurl,
				data: {
					id,
					isQuiz,
					action,
					quizAnswer,
					isTrackerFrom
				},
				success: function (res) {
					const { status, msg } = res
					if (status) {
						jQuery(`.sidebar-${id}`).addClass('active')
						jQuery('#submit-tracker').remove()
						jQuery('.next-course-btn').show()
						// submitActivity.addClass('completed')
						// submitActivity.text('Erledigt')
						submitActivity.hide()
						jQuery('#feedback').css('width', '100%');
					}
				},
				error: function (err) {
					jQuery('#show-res').text('Etwas ist schief gelaufen. Bitte versuche es erneut.')
					jQuery('#show-res').addClass('error')
					shoWHideDiv('#show-res', 5000)
				}
			});
		}
	});

	jQuery(document).on('click', "#submit-tracker", function (e) {
		e.preventDefault();

		let id = jQuery('.toolscontent-wrap').attr('id')
		// Question 1
		let question1 = jQuery('.question-1 button.active').text()
		let question1Text = jQuery('.question-1-input').val()

		// Question 2
		let question2 = jQuery('.question-2').val()

		// Question 3 - Tabs
		let question3 = []
		let activeTab = jQuery('.tabs .active').attr('id')
		let question3Active = jQuery(`.${activeTab} button.active`).length
		if (question3Active) {
			jQuery(`.${activeTab} button`).each(function () {
				if (jQuery(this).hasClass('active')) {
					let text = jQuery(this).find('.content').text();
					let img = jQuery(this).find('img').attr('src');
					question3.push({ img, text });
				}
			});
		}

		let question3Text = jQuery('.question-3-input').val()

		// Question 4
		let question4 = jQuery('.question-4-input').val()

		// Question 5
		let question5 = []
		let question5Active = jQuery(`.question-5 button.active`).length
		if (question5Active) {
			jQuery(".question-5 button").each(function () {
				if (jQuery(this).hasClass('active')) {
					let text = jQuery(this).find('.content').text();
					let img = jQuery(this).find('img').attr('src');
					question5.push({ img, text });
				}
			});
		}
		let question5Text = jQuery('.question-5-input').val()

		// Question 6
		let question6 = jQuery('.question-6-input').val()

		// Question 7
		let question7 = jQuery('.question-7-input').val()

		// Question 8
		// let question8 = jQuery('.question-8 button.active').text()

		if (!question1) {
			return showErrorMsg('error-question-1')
		} else if (!question3) {
			return showErrorMsg('error-question-3')
		} else if (!question4) {
			return showErrorMsg('error-question-4')
		} else if (!question5) {
			return showErrorMsg('error-question-5')
		} else if (!question6) {
			return showErrorMsg('error-question-6')
		} else if (!question7) {
			return showErrorMsg('error-question-7')
		// } else if (!question8) {
		// 	return showErrorMsg('error-question-8')
		}

		let trackerData = {
			question1,
			question1Text,

			question2,

			question3,
			question3Text,

			question4,

			question5,
			question5Text,

			question6,

			question7,

			// question8
		}

		jQuery.ajax({
			type: "post",
			url: ajaxurl,
			data: {
				data: trackerData,
				action: "onTrackerSubmit",
			},
			success: function (res) {
				const { status, postId } = res
				if (status) {
					if (id) {
						window.isTrackerFrom = postId
						jQuery('.submit-activity').trigger('click')
					} else {
						jQuery('.button-submit-wrap').remove();
						jQuery('.submit-tracker-result span').text('Dein Eintrag wurde erfolgreich gespeichert.');
						jQuery('.submit-tracker-result').addClass('success')
						jQuery('.submit-tracker-result').show()
					}
				}
			},
			error: function (err) {
				jQuery('.submit-tracker-result span').text('Etwas ist schief gelaufen. Bitte versuche es erneut.')
				jQuery('.submit-tracker-result').addClass('error')
			}
		});
	})

	jQuery(document).on('click', "#quiz-feedback-submit", function (e) {
		e.preventDefault(); 
		let metaId = jQuery(this).attr('meta-id')
		let ranger = jQuery('#quiz-feedback-ranger').val()
		let comment = jQuery('#quiz-feedback-comment').val()

		if (!ranger) {
			return showErrorMsg('error-question-1')
		} else if (!comment) {
			return showErrorMsg('error-question-3')
		}


		jQuery.ajax({
			type: "post",
			url: ajaxurl,
			data: {
				ranger,
				metaId,
				comment,
				action: "onFeedbackSubmit",
			},
			success: function (res) {
				console.log('res', res);
				const { status } = res
				if (status) {
					jQuery('#evaluation-popup').addClass('completed')
					jQuery('#evaluation-popup').removeClass('submit-activity')
					jQuery('#evaluation-popup').removeAttr('id')
					jQuery('#feedback').hide()
					jQuery('#show-res').text('Dein Feedback wurde erfolgreich übermittelt.')
					jQuery('#show-res').addClass('error')
					shoWHideDiv('#show-res', 5000)

					setTimeout(() => {
						location.reload();
					}, 2000);
				}
			},
			error: function (err) {
				jQuery('#show-res').text('Etwas ist schief gelaufen. Bitte versuche es erneut.')
				jQuery('#show-res').addClass('error')
				shoWHideDiv('#show-res', 5000)
			}
		});
	})

	jQuery(document).on('click', ".symptoms-step-next", function (e) {
		e.preventDefault();
		moveSymptomsTrackerFormStep();
	});

	jQuery(document).on('click', ".symptoms-step-back", function (e) {
		e.preventDefault();
		moveSymptomsTrackerFormStep('back');
	});

	jQuery(document).on('click', "#submit-symptoms-tracker", function (e) {
		e.preventDefault();

		let id = jQuery('.toolscontent-wrap').attr('id')
		let question1 = jQuery('.question-1 button.active').text()
		let question1Text = jQuery('.question-1-input').val()
		let question2 = jQuery('.question-2 button.active').text()
		let question2Text = jQuery('.question-2-input').val()
		let question3 = jQuery('.question-3').val()
		let question4 = jQuery('.question-4').val()
		
		// Question 5 - Tabs
		let question5 = []
		let activeTab = jQuery('.tabs .active').attr('id')
		let question5Active = jQuery(`.${activeTab} button.active`).length
		if (question5Active) {
			jQuery(`.${activeTab} button`).each(function () {
				if (jQuery(this).hasClass('active')) {
					let text = jQuery(this).find('.content').text();
					let img = jQuery(this).find('img').attr('src');
					question5.push({ img, text });
				}
			});
		}

		// let question6 = jQuery('.question-6 button.active').text()


		if (!question1) {
			showSymptomsTrackerFormStep(0);
			return showErrorMsg('error-question-1')
		} else if (!question2) {
			showSymptomsTrackerFormStep(1);
			return showErrorMsg('error-question-3')
		} else if (!question3) {
			showSymptomsTrackerFormStep(2);
			return showErrorMsg('error-question-3')
		} else if (!question4) {
			showSymptomsTrackerFormStep(3);
			return showErrorMsg('error-question-4')
		} else if (!question5) {
			showSymptomsTrackerFormStep(4);
			return showErrorMsg('error-question-5')
		// } else if (!question6) {
		//	showSymptomsTrackerFormStep(5);
		// 	return showErrorMsg('error-question-6')
		}

		let trackerData = {
			question1,
			question2,
			question3,
			question4,
			question5,
			question1Text,
			question2Text,
			// question6
		}

		jQuery.ajax({
			type: "post",
			url: ajaxurl,
			data: {
				data: trackerData,
				type: "symptoms",
				action: "onTrackerSubmit",
			},
			success: function (res) {
				const { status, postId } = res
				if (status) {
					if (id) {
						window.isTrackerFrom = postId
						jQuery('.submit-activity').trigger('click')
					} else {
						jQuery('.button-submit-wrap').remove();
						jQuery('.submit-tracker-result span').text('Dein Eintrag wurde erfolgreich gespeichert.');
						jQuery('.submit-tracker-result').addClass('success')
						jQuery('.submit-tracker-result').show()
					}
				}
			},
			error: function (err) {
				jQuery('.submit-tracker-result span').text('Etwas ist schief gelaufen. Bitte versuche es erneut.')
				jQuery('.submit-tracker-result').addClass('error')
			}
		});
	})

		
	jQuery('input[type="range"]').rangeslider({
		// Feature detection the default is `true`.
		// Set this to `false` if you want to use
		// the polyfill also in Browsers which support
		// the native <input type="range"> element.
		polyfill: false,

		// Default CSS classes
		rangeClass: 'rangeslider',
		disabledClass: 'rangeslider--disabled',
		horizontalClass: 'rangeslider--horizontal',
		fillClass: 'rangeslider__fill',
		handleClass: 'rangeslider__handle',

		// Callback function
		onInit: function () {
			$rangeEl = this.$range;
			// add value label to handle
			var $handle = $rangeEl.find('.rangeslider__handle');
			var handleValue = '<div class="rangeslider__handle__value">' + this.value + '</div>';
			$handle.append(handleValue);

			// get range index labels 
			var rangeLabels = this.$element.attr('labels');
			rangeLabels = rangeLabels.split(', ');

			// add labels
			$rangeEl.append('<div class="rangeslider__labels"></div>');
			jQuery(rangeLabels).each(function (index, value) {
				$rangeEl.find('.rangeslider__labels').append('<span class="rangeslider__labels__label">' + value + '</span>');
			})
		},

		// Callback function
		onSlide: function (position, value) {
			var $handle = this.$range.find('.rangeslider__handle__value');
			$handle.text(this.value);
		},

		// Callback function
		onSlideEnd: function (position, value) { }
	});

});

/**
 * Show the step of the symptoms tracker from
 *
 * @param {number} step Show the step by index
 */
function showSymptomsTrackerFormStep(step) {
	jQuery('.symptoms-wrap.step').each(function (i) {
		const $el = jQuery(this);
		if (parseInt(step) === i) {
			$el.addClass('step--show');
		} else {
			$el.removeClass('step--show');
		}
	});
}

/**
 * Move symptoms tracker form step
 *
 * @param {string} direction Next or back direction
 */
function moveSymptomsTrackerFormStep(direction = 'next') {
	const $steps = jQuery('.symptoms-wrap.step');
	let done = false;
	$steps.each(function (i) {
		if (done) {
			// Process finished
			return;
		}
		const $el = jQuery(this);
		if ($el.hasClass('step--show')) {
			const step = $steps[direction === 'next' ? i + 1 : (i - 1)];
			if (step) {
				$el.removeClass('step--show');
				jQuery(step).addClass('step--show');
			}
			done = true;
		}
	});
}

function showErrorMsg(id) {
	jQuery(`.${id}`).show()
	jQuery('html, body').animate({
		scrollTop: jQuery(`.${id.replace('error-','')}`).offset().top-250
	}, 2000);
}