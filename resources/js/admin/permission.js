$("#btnSearchPermission").click(function(){
    let id = $("#role").val();
    let url = "/permission/response/"+id;
    let str = '';
    $.ajax({
        type:'GET',
        url : url,
        async : false,
        success:function(data){
            let json = JSON.parse(data)

            $.each(json.Menu, function(i,e){
                
                if(e.menu_name == 'Dashboard'){
                    str += `
                        <div class="accordion">
                            <div class="accordion-header">
                                <div class="input-group">
                                    <label class="custom-switch mt-2">
                                   
                                        <input type="checkbox" name="ck_enable_${e.menu_id}" ${ e.menu_enable !=0 ? 'checked' : '' } class="custom-switch-input">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="custom-switch-description">${e.menu_name}</span>
                                    </label>
                                </div>
                            </div>
                        </div>`
                }else{
                    str += `
                        <div class="accordion">
                            <div class="accordion-header">
                                <div class="input-group">
                                    <label class="custom-switch mt-2">
   
                                        <input type="checkbox" name="ck_enable_${e.menu_id}" ${ e.menu_enable !=0 ? 'checked' : '' } class="custom-switch-input">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="custom-switch-description">${e.menu_name}</span>
                                    </label>
                                    <div class="input-group-append" style="margin-left : 10px;">
                                        <button type="button" class="btn btn-outline-default" data-toggle="collapse" data-target="#section_${e.menu_id}" aria-expanded="true"><i class="fa fa-caret-down"></i></button>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-body collapse show" id="section_${e.menu_id}">
                        `
                    $.each(e.Submenu, function(j,k){
                        str += `
                            
                                <div class="accordion-subbody">
                                    <label class="custom-switch mt-2">
                                        <span class="custom-switch-description">${k.name}</span>
                                        <input type="checkbox" name="ck_enable_${k.id}" ${ k.enable !=0 ? 'checked' : '' } value="${k.enable}" class="custom-switch-input">
                                        <span class="custom-switch-indicator"></span>
                                    </label>

                                    <div class="input-group" style="padding-left : 30px;">
                                        <label class="custom-switch mt-2">
                                            <input type="checkbox" name="ck_write_${k.id}" ${ k.write !=0 ? 'checked' : '' } value="${k.write}" class="custom-switch-input">
                                            <span class="custom-switch-indicator"></span>
                                            <span class="custom-switch-description">Write</span>
                                        </label>

                                        <label class="custom-switch mt-2">
                                            <input type="checkbox" name="ck_update_${k.id}" ${ k.update !=0 ? 'checked' : '' } value="${k.update}" class="custom-switch-input">
                                            <span class="custom-switch-indicator"></span>
                                            <span class="custom-switch-description">Update</span>
                                        </label>

                                        <label class="custom-switch mt-2">
                                            <input type="checkbox" name="ck_delete_${k.id}" ${ k.delete !=0 ? 'checked' : '' } value="${k.delete}" class="custom-switch-input">
                                            <span class="custom-switch-indicator"></span>
                                            <span class="custom-switch-description">Delete</span>
                                        </label>
                                    </div> 
                                </div>
                           
                           
                        `
                    })

                    str += ` </div></div>`
                    
                }
            })

            str += `
                <div class="col-12 text-right">
                <button class="btn btn-primary">Submit</button>
                </div>
                
            `;

            $("#accordion").html(str);
        }
    });
})
