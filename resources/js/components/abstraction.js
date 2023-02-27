import { Application } from '@splinetool/runtime';

const canvas = document.querySelector('.abstraction')
if(canvas) {
    const app = new Application(canvas);
    app.load('https://prod.spline.design/ZaQAASwsou9CNldi/scene.splinecode');
}
