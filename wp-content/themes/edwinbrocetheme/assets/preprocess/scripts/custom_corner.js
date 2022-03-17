class customCorner {

    static get inputProperties() {
        return [
                        '--radius', 
                        '--onhover_color1',
                        '--onhover_color2'
                    ];
    }

    paint(ctx,size,props) {
        let radius = Number(props.get('--radius').toString().replace('px', ''))
        if (props.get('--radius').toString().includes("%")) {
            radius = Number(props.get('--radius').toString().replace('%', ''))
            let radius_x = Math.min(radius * size.width / 100, size.width / 2)
            let radius_y = Math.min(radius * size.height / 100, size.height / 2)
            radius = Math.sqrt((Math.pow(radius_x,2)*(Math.pow(radius_y,2))))
        }
        
        //Masking
        ctx.beginPath()
        ctx.moveTo(0, 0)
        ctx.lineTo(0, size.height - radius)
        ctx.lineTo(radius, size.height)
        ctx.lineTo(size.width, size.height)
        ctx.lineTo(size.width, 0 + radius)
        ctx.lineTo(size.width - radius, 0)
        ctx.lineTo(0, 0)
        let my_gradient= ctx.createLinearGradient(0, 0, size.width, size.height);
        my_gradient.addColorStop(0, props.get('--onhover_color1'));
        my_gradient.addColorStop(1, props.get('--onhover_color2'));
        ctx.fillStyle = my_gradient;

        ctx.closePath()
        ctx.fill()

    }
}

registerPaint('custom_corner', customCorner)