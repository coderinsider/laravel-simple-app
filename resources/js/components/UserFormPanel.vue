<template>
	<div class="">
		<p class="error-text" v-text="errorMessage"></p>
		<div class="checkingform">
			<div class="from-group">
				<label>Name</label>
				<input type="checkbox" checked v-model="saveRecords.name"/>
			</div>
			<div class="from-group">
				<label>Phone Number</label>
				<input type="checkbox" checked v-model="saveRecords.phone"/>
			</div>
			<div class="from-group">
				<label>Date Of birth</label>
				<input type="checkbox" checked v-model="saveRecords.datebirth"/>
			</div>

			<div class="from-group">
				<label>Gender</label>
				<input type="checkbox" v-model="saveRecords.user_gender"/>
			</div>
			<div class="from-group bottom-20">
				<input type="submit" @click="saveFormRecord" class="save-record" value="Save"/>
			</div>							
		</div>
		{{ responseDataLists }}
	</div>
</template>
<script>
import axios from 'axios';
export default {
	data() {
		return {
			firstName: "Myat Ko Ko",
			saveRecords: {
				name: 1,
				phone: 1,
				datebirth: 1,
				user_gender: 0,
			},
			responseDataLists: [],
			errorMessage: ''
		}
	},
	methods: {

		saveFormRecord() {
			const setHeaders = {
				headers: {
					'Content-Type': 'application/json'
				}
			}
			axios.post('/form/create-record', {saveRecords: this.saveRecords}, setHeaders)
			.then((resp) => {
				this.responseDataLists = resp.data;
			}).catch((err) => {
				this.errorMessage = err;
			});
			
		}
	}
}
</script>
<style scoped>
.error-text {
	color: red;
	font-weight: bold;
}
.checkingform {
	border: 1px solid #ddd;
	background:#fff;
	box-shadow: 0 0 3px 0 #ddd;
	padding: 20px;
}
.save-record {
	background: #d5333e;
	border: 2px solid #d5333e;
	color: #fff;
	padding: 3px 25px;
	border-radius: 5px;
	
}
.bottom-20 {
	margin-top: 20px;
}
</style>