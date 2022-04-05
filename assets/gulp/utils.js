import notify from 'gulp-notify';

export const msgERROR = {
	errorHandler: notify.onError({
		title: 'Fix that ERROR:',
		message: '<%= error.message %>',
		time: 2000,
	}),
};

const date = new Date();
export const today =
	date.getFullYear() +
	'.' +
	String(date.getMonth() + 1) +
	'.' +
	String(date.getDate()) +
	date.getHours() +
	date.getMinutes() +
	date.getSeconds();