<template>
    <div class="feedback">
        <h1>Контакты</h1>
        <div class="how-to-help">Выберите чем мы можем помочь вам</div>
        <div class="content">
            <div class="what-you-need">Вам нужно</div>
            <div class="list choose-service-elem">
                <div class="item"
                     v-for="(service, index) in services"
                     :key="index"
                >
                    <button
                        class="btn btn-click magnetic"
                        data-strength="20"
                        data-strength-text="5"
                        @click="selectService(service)"
                        :class="{selected: chooseServices.includes(service)}"

                    >
                        <div class="btn-text">
                            <div class="btn-fill"></div>
                            <div class="btn-text-inner change">{{ service }}</div>
                        </div>
                    </button>
                </div>
            </div>
            <div class="form">
                <div class="group">
                    <div class="field mr">
                        <input type="text" :value="name" @input="validName" name="username" placeholder="Ваше имя"/>
                    </div>
                    <div class="field ml">
                        <input type="text" :value="email" @change="validEmail" name="email"  placeholder="E-mail"/>
                        <span class="field_error-massage" v-if="invalidEmail">THIS IS INVALID EMAIL*</span>
                    </div>
                </div>
                <div class="group">
                    <div class="field">
                        <input type="text" v-model="comment" name="about_project" placeholder="О вашем проекте"/>
                    </div>
                </div>
                <div class="form__file magnetic btn-text" data-strength="20" data-strength-text="5" @change="selectFiles">
                    <input name="upload-file" type="file" id="input__file" class="input input__file " multiple accept=".txt, .pdf">
                    <label for="input__file" class="input__file-button">
                        <span class="input__file-button-text">Прикрепить</span>
                    </label>
                    <div class="preview"  v-for="(file, index) in chooseFiles">
                        <div class="preview-image" v-if="chooseFiles.length">
                            <span class="uploadFileText">{{file.name}}</span>
                            <div class="preview-remove" @click="removeFile(index)">&times</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="budget">
                <div class="title">Бюджет</div>
                <div class="list">
                    <div class="item" v-for="(budget, index) in budgets" :key="index">
                        <button
                            class="btn btn-click magnetic"
                            data-strength="20"
                            data-strength-text="5"
                            @click="chooseBudget = budget"
                            :class="{selected: chooseBudget === budgets[index]}"
                        >
                            <div class="btn-text">
                                <div class="btn-fill"></div>
                                <div class="btn-text-inner change">{{ budget }}</div>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
            <div class="captcha">This site is protected by reCAPTCHA and the Google Privacy Policy and Terms of Serviceapply.</div>
            <button
                @click="send"
                class="btn btn-click magnetic send"
                data-strength="20"
                data-strength-text="5"
            >
                <div class="btn-text">
                    <div class="btn-fill"></div>
                    <div class="btn-text-inner">Отправить</div>
                </div>
            </button>
        </div>
    </div>

</template>
<script>
import axios from "axios";
export default {
    name: 'feedback',
    data() {
        return {
            services: [
                'веб-дизайн', //0
                'интернет-магазин', // 1
                'корпоротивный веб-сайт', //2
                'CRM-система', // 3
                'дизайн приложения',// 4
                'telegram-bot', // 5
                'SEO оптимизация', // 6
                'одностраничный сайт', // 7
                'другое', // 8
            ],
            budgets: [
                '70-150 тыс',
                '150-300 тыс',
                '300-500 тыс',
                '500-800 тыс',
                '+1 млн'
            ],
            chooseServices: [],
            chooseFiles: [],
            chooseBudget: '',
            comment: '',
            email: '',
            name: '',
            invalidEmail: false

        }
    },
    methods: {
        selectService(value) {
                if(this.chooseServices.includes(value)) {
                    this.chooseServices = this.chooseServices.filter(elem => elem !== value)
                } else {
                    this.chooseServices.push(value)
                }
        },

        send() {
            //
             //let formData = new FormData();
            //
            // formData.append('name', this.name)
            // formData.append('email', this.email)
            // formData.append('budget', this.chooseBudget)
            // formData.append('comment', this.comment)
            //  for(let i = 0; i < this.chooseFiles.length; i++){
            //
            //      let file = this.chooseFiles[i];
            //
            //      formData.append('file[' + i + ']', file);
            //  }
            axios.post( '/api/feedback', {
                    name: this.name,
                    email: this.email,
                    budget: this.chooseBudget,
                    comment: this.comment,
                    services: this.chooseServices,
                    files: this.chooseFiles
            },
                {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }
            ).then(response => console.log(response)).catch(error => console.log(error.response.data.message));
        },

        validation(ev) {
          console.log(ev.target.value)
        },

        selectFiles(ev) {
            this.chooseFiles = Array.from(ev.target.files)
            console.log('chooseFile', this.chooseFiles)
        },
        removeFile(index) {
            this.chooseFiles.splice(index, 1)
        },

        validName(event) {
            this.name = event.target.value.replaceAll(/\d/g, '').trim()

        },
        validEmail(event) {
            this.email = event.target.value
            let regExp = /^((?!\.)[\w-_.]*[^.])(@\w+)(\.\w+(\.\w+)?[^.\W])$/gm;

            if(regExp.test(this.email)) return

            if(this.email.length > 0 && !regExp.test(this.email)) {
                this.invalidEmail = true
                event.target.style.borderBottom = '1px solid #d57676'

            }
            setTimeout(() => {
                this.email = ''
                this.invalidEmail = false
                event.target.style.borderBottom = '1px solid #CBCBCB'
                event.target.focus()
            }, 2000)
        }
    },
    computed: {}
}


</script>
