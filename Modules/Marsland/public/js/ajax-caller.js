const appendMegaMenuProperties = () => {
    const fivePropertiesContainer = $('#fiveProperties');
    fivePropertiesContainer.empty();
    $.ajax({
        url: "{{ route('property.five_properties') }}",
        type: 'GET',
        success: function (response) {
            response.forEach(property => {
                const propertyCard = `
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="single-best-product bg-none h-calc d-flex p-0">
                                        <a href="" class="d-flex align-items-center justify-content-between gap-15 flex-wrap mb-15">
                                            <div class="d-flex align-items-start gap-20">
                                                <div class="icon">
                                                    <i class="ri-home-8-line"></i>
                                                </div>
                                                <div class="cat-caption">
                                                    <div class="cat-caption d-flex justify-content-between align-items-center mb-10 flex-wrap gap-15">
                                                        <h4 class="title  line-clamp-1 font-600 text-title text-capitalize">
                                                            ${property.name}
                                                        </h4>
                                                        <span class="product-tag font-700 text-capitalize">Property</span>
                                                    </div>
                                                    <p class="pear line-clamp-2 mb-0">
                                                        ${property.description}
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            `;
                fivePropertiesContainer.append(propertyCard);
            });
            const viewAllButton = `
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="f-right mt-10">
                                    <a href="#" class="btn-primary-fill big-btn primary-soft-btn">View All Properties <i class="ri-arrow-right-line"></i></a>
                                </div>
                            </div>
                            `;
            fivePropertiesContainer.append(viewAllButton);
        },
        error: function (error) {
            console.log('Error:', error);
        }
    });
}

appendMegaMenuProperties();
